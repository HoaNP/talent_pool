<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ApplyActivity */

$this->title = 'Create Apply Activity';
$this->params['breadcrumbs'][] = ['label' => 'Apply Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apply-activity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
