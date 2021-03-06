<?php
namespace frontend\controllers;

use common\models\ApplyActivity;
use common\models\CommonFunction;
use common\models\Project;
use common\models\Tag;
use common\models\UserSearch;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\Skill;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\base\Exception;



/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'logout', 'change-password', 'signup', 'request-password-reset'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['index', 'logout', 'change-password'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $numberOfProject = (new CommonFunction())->getProjectNumber();
        $numberOfStaff = (new CommonFunction())->getStaffNumber();
        $this->actionDemo1();
        return $this->render('index',[
            'numberOfProject' => $numberOfProject,
            'numberOfStaff' => $numberOfStaff,
        ]);
    }

    public function actionUser()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['role' => User::ROLE_STAFF]);
        return $this->render('../user/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
          ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
                [

                ]
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionUserContact()
    {
        return $this->render('../user/user-contact-form');

    }
    public function actionAccount()
    {
        try {
            return $this->render('viewProfile', [
                'model' => User::findOne(Yii::$app->user->identity->getId()),
            ]);
        } catch (Exception $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
    }
    public function actionView ($id){
        $model = User::findOne($id);
        return $this->render('viewProfile', [
            'model' => $model,
        ]);

    }
    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = User::findOne(Yii::$app->user->identity->getId());//$this->findModel($id);
        $request = Yii::$app->request;

        if ($model->load($request->post())) {
            $model->created_at = date("Y-m-d H:i:s");
            $imageName = $model->username . "_" . $model->created_at;
            if (!empty($model->imageFile)){
                $model->user_image = 'userImage/' . $imageName . "." . $model->imageFile->extension;
            }
            else {
                $model->user_image = 'Uploads/noImage.jpg';
            }
            if ($model->save())
            {
                return $this->render('viewProfile', [
                    'model' => User::findOne(Yii::$app->user->identity->getId()),
                ]);
            }
            else {
                var_dump($model->getErrors());
                exit();
            }

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    public function actionDemo(){
        $model = User::findAll(['role' => 20]);
        foreach ($model as $m){
            echo '{"id": "u' . $m->id . '", "label": "' . $m->username . '", "group": "users"},' . "<br>" ;
        }
        $skill = Skill::find()->all();
        foreach ($skill as $t){
            echo '{"id": "s' . $t->id . '", "label": "' . $t->skill_name . '", "group": "skills"},' . "<br>" ;
        }
        foreach ($model as $m){

            foreach ($m->skills as $t){
                echo '{"from": "u' . $m->id . '", ';
                echo '"to": "s' . $t->id . '"},' . "<br>" ;
            }
        }
        exit();
    }
    public function actionDemo1(){
        $myfile = fopen("project.json", "w") or die("Unable to open file!");
        $model = Project::findAll(['is_active' => 'Y']);
        fwrite($myfile, "{\"nodes\":[\n");
        foreach ($model as $m){
            fwrite($myfile, '{"id": "u' . $m->id . '", "label": "' . $m->project_name . '", "group": "projects"},' . "\n" );
            //echo '{"id": "u' . $m->id . '", "label": "' . $m->project_name . '", "group": "projects"},' . "<br>" ;
        }
        $skill = Tag::find()->all();
        $cnt = Tag::find()->count();
        $i = 0;
        foreach ($skill as $t){
            $i++;
            fwrite($myfile, '{"id": "s' . $t->id . '", "label": "' . $t->tag_name . '", "group": "tags"}');
            if ($i < $cnt) fwrite($myfile, ",\n");
//            echo '{"id": "s' . $t->id . '", "label": "' . $t->tag_name . '", "group": "tags"},' . "<br>" ;
        }

        fwrite($myfile, "\n ], \n \"edges\":[ \n");
        foreach ($model as $m){

            foreach ($m->tags as $t){
                fwrite($myfile,'{"from": "u' . $m->id . '", "to": "s' . $t->id . '"},' . "\n");
//                echo '{"from": "u' . $m->id . '", "to": "s' . $t->id . '"},' . "<br>" ;
            }
        }
        $myfile = fopen("project.json", "a");
        $stat = fstat($myfile);
        ftruncate($myfile, $stat['size']-2);
        //fwrite($myfile, "\n]}");
        fwrite($myfile, "]\n}");
        fclose($myfile);

        //exit();
    }

    public function actionLog(){
        $id = Yii::$app->user->identity->getId();
        $query = ApplyActivity::find()->where(['user_id' => $id]);
        // $model = ApplyActivity::findAll(['user_id' => $id]);
        $provider = new ActiveDataProvider([
            'query' => $query,
            ]);
        foreach ($provider as $t){
//            echo $t;
        }
//                var_dump($provider);
//        exit();
        return $this->render('log', ['model' => $provider]);
//        var_dump($model);
//        exit();

    }
}
