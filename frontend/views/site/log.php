<?php
/**
 * Created by PhpStorm.
 * User: tungphung
 * Date: 19/12/16
 * Time: 4:21 PM
 */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

$this->title = 'My activities';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="log-view">

    <h1><?= Html::encode($this->title) ?></h1>

<?= GridView::widget([
    'dataProvider' => $model,
    'columns' => [
    	['class' => 'yii\grid\SerialColumn'],                
        'user.username',
        [
            'label' => 'Project name',
        	'value' => 'project.project_name',
			'format' => 'raw',
        ],

        'created_at',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view}',
            'buttons' => [
                'view' => function ($url, $model) {
                    //echo ($url);
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                        'title' => Yii::t('app', 'lead-view'),
                    ]);
                    //return ('project/view', ['id' => $model->project->id]);
                },

            ],
            'urlCreator' => function ($action, $model, $key) {
			    if ($action === 'view') {
                    $url ='index.php?r=project/view&id='.$model->project->id;
                    return $url;
			    }			    
			}
        ],

    ],
]) ?>

</div>