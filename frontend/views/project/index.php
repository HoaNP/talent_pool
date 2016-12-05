<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Tag;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Project', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'project_name',
            'job_type',
            'project_summary',
            [
                'label' => "Created by",
                'attribute' => 'user_id',
                'value' => 'user.username',
            ],

            [
                'attribute' => 'tag_ids',
                'format' => 'raw',
                'filter' => Html::activeDropDownList($searchModel, 'tag_ids', ArrayHelper::map(Tag::find()->asArray()->all(), 'id', 'tag_name'),['class'=>'form-control','prompt' => 'Select Category']),
                'value' => function($data){
                    $s = "";
                    foreach ($data->tags as $t){
                        //$model = $model->findModel('id');
                        $s = $s . $t->tag_name . "<br>";
                        //echo $t->tag_name . "<br>";
                    }
                    return $s;

                },

            ],

            // 'project_photo',
            'responsibilities',
            'salary_range',
            // 'is_active',
            // 'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
<!--    --><?//= LinkPager::widget(['pagination' => $pagination]) ?>

</div>
