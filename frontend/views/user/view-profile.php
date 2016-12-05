<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Skill;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Skill */
/* @var $form ActiveForm */
?>
<div class="user-view-profile">

    <?php $form = ActiveForm::begin(); ?>


    <!--    --><?//= $form->field($model, 'skill_name') ?>
    <?= $form->field($user, 'username') ?>
    <?= $form->field($user, 'email') ?>
    <?php
    $data = [];
    foreach ($user->skills as $t) {
        $data [] = $t->skill_name;
    }
    $user->skill_ids = $data;
    echo $form->field($user, 'skill_ids')->widget(Select2::classname(), [
        'model' => $user,
        'attribute' => 'skill_ids',
        //'value' => $data,
        'data' => ArrayHelper::map(Skill::find()->all(), 'skill_name', 'skill_name'),
        'options' => [
            'multiple' => true,
        ],
        'pluginOptions' => [
            'skills' => true,
        ],
    ]);
    ?>


    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-index -->
