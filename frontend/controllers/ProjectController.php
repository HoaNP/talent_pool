<?php

namespace frontend\controllers;

use app\models\Tag;
use app\models\TagSet;
use app\models\User;
use Yii;
use app\models\Project;
use yii\helpers\ArrayHelper;
use app\models\ProjectSearch;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Comment;
use yii\data\Pagination;

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
        $dataProvider->pagination->pageSize=10;
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


        return $this->render('view', [
            'model' => $model,
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
        $this->findModel($id)->delete();

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

}
