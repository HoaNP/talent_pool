<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Skill;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <?php
    $data = [];
    foreach ($model->skills as $t) {
        $data [] = $t->skill_name;
    }
    $model->skill_ids = $data;
    echo $form->field($model, 'skill_ids')->widget(Select2::classname(), [
        'model' => $model,
        'attribute' => 'skill_ids',
        'value' => $data,
        'data' => ArrayHelper::map(Skill::find()->all(), 'skill_name', 'skill_name'),
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
