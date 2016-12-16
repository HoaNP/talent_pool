<?php

namespace backend\controllers;

use Yii;
use app\models\ApplyActivity;
use app\models\ApplyActivitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ApplyActivityController implements the CRUD actions for ApplyActivity model.
 */
class ApplyActivityController extends Controller
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
     * Lists all ApplyActivity models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ApplyActivitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ApplyActivity model.
     * @param integer $id
     * @param integer $user_id
     * @param integer $project_id
     * @return mixed
     */
    public function actionView($id, $user_id, $project_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $user_id, $project_id),
        ]);
    }

    /**
     * Creates a new ApplyActivity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ApplyActivity();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'user_id' => $model->user_id, 'project_id' => $model->project_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ApplyActivity model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $user_id
     * @param integer $project_id
     * @return mixed
     */
    public function actionUpdate($id, $user_id, $project_id)
    {
        $model = $this->findModel($id, $user_id, $project_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'user_id' => $model->user_id, 'project_id' => $model->project_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ApplyActivity model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $user_id
     * @param integer $project_id
     * @return mixed
     */
    public function actionDelete($id, $user_id, $project_id)
    {
        $this->findModel($id, $user_id, $project_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ApplyActivity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $user_id
     * @param integer $project_id
     * @return ApplyActivity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $user_id, $project_id)
    {
        if (($model = ApplyActivity::findOne(['id' => $id, 'user_id' => $user_id, 'project_id' => $project_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
