<?php
/**
 * Created by PhpStorm.
 * User: tungphung
 * Date: 2/12/16
 * Time: 9:40 PM
 */
?>
<div class="user-contact-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'contact_type')
    ->dropDownList(
        $model->getUserContactTypeOptions(),
        ['prompt'=>Yii::t('frontend','What type of contact is this?')]
    )->label(Yii::t('frontend','Type of Contact')) ?>
</div>
