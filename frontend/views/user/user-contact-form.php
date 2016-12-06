<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Skill;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-contact-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'contact_type')
    ->dropDownList(
        $model->getUserContactTypeOptions(),
        ['prompt'=>Yii::t('frontend','What type of contact is this?')]
    )->label(Yii::t('frontend','Type of Contact')) ?>