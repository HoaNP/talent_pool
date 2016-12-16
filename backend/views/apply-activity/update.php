<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ApplyActivity */

$this->title = 'Update Apply Activity: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Apply Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'user_id' => $model->user_id, 'project_id' => $model->project_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apply-activity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
