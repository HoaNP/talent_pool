<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use common\models\Tag;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'project_name')->textInput(['maxlength' => true]) ?>
    <?php
    $data = ['Full-time' => 'Full-time',
            'Part-time' => 'Part-time',
            'Internship' => 'Internship'
    ];
    echo $form->field($model, 'job_type')->widget(Select2::classname(), [
        'data' => $data,
        'options' => ['placeholder' => 'Select a job type ...'],
        'pluginOptions' => [
        'allowClear' => true
        ],
    ]);
    ?>
    <?= $form->field($model, 'project_summary')->textarea(['maxlength' => true, 'rows' => 7]) ?>
    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <?= $form->field($model, 'responsibilities')->textarea(['maxlength' => true, 'rows' => 7]) ?>

    <?= $form->field($model, 'salary_range')->textInput(['maxlength' => true]) ?>
    <?php
    $data = [];
    foreach ($model->tags as $t) {
        $data [] = $t->tag_name;
    }
    $model->tag_ids = $data;
    echo $form->field($model, 'tag_ids')->widget(Select2::classname(), [
        'model' => $model,
        'attribute' => 'tag_ids',
        'value' => $data,
        'data' => ArrayHelper::map(Tag::find()->all(), 'tag_name', 'tag_name'),
        'options' => [
            'multiple' => true,
        ],
        'pluginOptions' => [
            'tags' => true,
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
