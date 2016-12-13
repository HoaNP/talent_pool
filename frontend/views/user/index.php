<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\Skill;


/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            'summary',
            [
                'attribute' => 'skill_ids',
                'format' => 'raw',
                'filter' => Html::activeDropDownList($searchModel, 'skill_ids', ArrayHelper::map(Skill::find()->asArray()->all(), 'id', 'skill_name'),['class'=>'form-control','prompt' => 'Select Talent']),
                'value' => function($data){
                    $s = "";
                    foreach ($data->skills as $t){
                        $s = $s . $t->skill_name . "<br>";
                    }
                    return $s;

                },

            ],
        ],
    ]); ?>
</div>
