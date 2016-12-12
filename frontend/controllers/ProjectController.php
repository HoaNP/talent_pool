<?php

namespace frontend\controllers;

use common\models\ApplyActivity;
use common\models\Comment;
use common\models\Project;
use common\models\ProjectSearch;
use common\models\Tag;
use common\models\TagSet;
use common\models\User;
use Yii;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\db\Query;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Project models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$dataProvider->pagination->pageSize = 10;

//        var_dump($searchModel);
//        exit();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        //    'pagination' => $pagination,
        ]);
    }

    /**
     * Displays a single Project model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $user_id = Yii::$app->user->identity->getId();
        $data = ApplyActivity::find()->where(['user_id'=> $user_id, 'project_id' => $id])->all();
        $status = !empty($data);
        return $this->render('view', [
            'model' => $model,
            'status' => $status,
        ]);
    }

    /**
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Project();
        if ($model->load(Yii::$app->request->post())) {
            $model->created_at = date("Y-m-d H:i:s");
            $imageName = $model->created_at . "_" . $model->project_name;
            $model->is_active = "Y";
            $model->user_id = Yii::$app->user->identity->getId();
            //$model->load(Yii::$app->request->get()); 
            //$model->tag_ids = ArrayHelper::map($model->tagSets, 'tag_name', 'tag_name');
            if (!empty($model->imageFile)){
                //$model->imageFile->saveAs('Uploads/' . $imageName . "." . $model->imageFile->extension);
                $model->project_photo = 'Uploads/' . $imageName . "." . $model->imageFile->extension;
            }
            else {
                $model->project_photo = 'Uploads/noImage.jpg';
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }


        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->created_at = date("Y-m-d H:i:s");
            $imageName = $model->created_at . "_" . $model->project_name;
            $model->is_active = "Y";
            $model->user_id = Yii::$app->user->identity->getId();
            //$model->load(Yii::$app->request->get()); 
            //$model->tag_ids = ArrayHelper::map($model->tagSets, 'tag_name', 'tag_name');
            if (!empty($model->imageFile)){
                //$model->imageFile->saveAs('Uploads/' . $imageName . "." . $model->imageFile->extension);
                $model->project_photo = 'Uploads/' . $imageName . "." . $model->imageFile->extension;
            }
            else {
                $model->project_photo = 'Uploads/noImage.jpg';
            }
            if ($model->save()) {
                //var_dump($model);
            }
            else {
                var_dump($model->getErrors());
            }
            return $this->redirect(['view', 'id' => $model->id]);

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Project model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $model = $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionApply($id){
        $user_id = Yii::$app->user->identity->getId();
        $apply = new ApplyActivity();
        Yii::$app->mailer->compose(['text' => '@common/mail/ReplyApplication'])
            ->setFrom([Yii:: $app->params ['supportEmail'] => Yii:: $app->name])
            ->setTo('phuonghoatink22@gmail.com')
            ->setSubject('Message subject')
            ->send();


        $apply->user_id = $user_id;
        $apply->project_id = $id;
        $apply->created_at = Date('dd-MM-yyyy');
        if (!$apply->save()) {
            var_dump($apply->getErrors());
            exit();
        }
        return $this->render('apply');
    }

}
