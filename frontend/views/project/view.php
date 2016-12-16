<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = $model->project_name;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?php
        if (Yii::$app->user->identity->role > User::ROLE_OFFICER || Yii::$app->user->identity->getId() === $model->user_id) {


            echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
            ?>
            <?php
            echo Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]);
        }
        ?>
     </p>

    
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user.username',
            'project_name',
            'job_type',
            'project_summary',
            'project_photo',
//            [
//                'attribute' => 'project_photo',
//                'format' => 'image',
//                'contentOptions' =>['style' => 'max-width:300px'],
//                'value' => function ($model) {
//                    return $model->getImageUrl();
//                },
//            ],
            'requirement',
            'salary_range',
            'info',
            [
                'label' => "Category",
                'format' => 'raw',
                'attribute' => function ($model){
                    $s = "";
                    foreach ($model->tags as $t){
                        $s = $s . $t->tag_name . "<br>";
                    }
                    return $s;
                }
            ],

        ],
    ]) ?>
    <p>
    <?php
        if($model->user_id !== Yii::$app->user->identity->getId())
        {
            if ($status) {
                echo Html::a('Do you want to join this project?', ['apply', 'id' => $model->id], [
                    'class' => 'btn btn-primary',
                    'disabled' => 'disabled',
                    'data' => [
                        'confirm' => 'Are you sure you want to join this project?',
                        'method' => 'post',
                    ],
                ]);
                echo " You have already applied for this job!";
            }
            else {
                echo Html::a('Do you want to join this project?', ['apply', 'id' => $model->id], [
                    'class' => 'btn btn-primary',
                    'data' => [
                        'confirm' => 'Are you sure you want to join this project?',
                        'method' => 'post',
                    ],
                ]);
            }
        }
    ?>
    </p>
</div>
