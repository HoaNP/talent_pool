<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\Tag;
use common\models\User;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
    <?php
        if (Yii::$app->user->identity->role > User::ROLE_STAFF)
         echo Html::a('Create Project', ['create'], ['class' => 'btn btn-success'])
    ?>


    </p>
    <?php
    $data = ['Full-time' => 'Full-time',
        'Part-time' => 'Part-time',
        'Internship' => 'Internship'
    ];
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'project_name',
            [
                'attribute' => 'job_type',
                'filter' => Html::activeDropDownList($searchModel, 'job_type',$data,['class'=>'form-control','prompt' => 'Select Category']),

            ],
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
                        $s = $s . $t->tag_name . "<br>";
                    }
                    return $s;

                },

            ],

            // 'project_photo',
            'responsibilities',
            'salary_range',
            // 'is_active',
            // 'created_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' => [
                    'delete' => function () {
                        return Yii::$app->user->identity->role > User::ROLE_STAFF ? true : false;
                    },
                    'update' => function () {
                        return Yii::$app->user->identity->role > User::ROLE_STAFF ? true : false;
                    }
                ]
            ],
        ],
    ]);
    ?>
<!--    --><?//= LinkPager::widget(['pagination' => $pagination]) ?>

</div>
