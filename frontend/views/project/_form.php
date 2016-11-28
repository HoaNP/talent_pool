<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_type_id')->textInput() ?>

    <?= $form->field($model, 'project_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'project_summary')->textarea(['maxlength' => true, 'rows' => 7]) ?>

    <?= $form->field($model, 'project_photo')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'project_photo')->fileInput() ?>

    <?= $form->field($model, 'responsibilities')->textarea(['maxlength' => true, 'rows' => 7]) ?>

    <?= $form->field($model, 'salary_range')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
