<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Skill;

/* @var $this yii\web\View */
/* @var $model app\models\Skill */
/* @var $form ActiveForm */
?>
<div class="site-profile">

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
    echo $form->field($skill, 'skill_ids')->widget(Select2::classname(), [
        'model' => $user,
        'attribute' => 'skill_ids',
        'value' => $data,
        'data' => ArrayHelper::map(Skill::find()->all(), 'skill_name', 'skills_name'),
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
