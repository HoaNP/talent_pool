<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Skill;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use yii\jui\DatePicker;



/* @var $this yii\web\View */
/* @var $model app\models\User */
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

    <?php
        $degree = [
            'Associate\'s Degrees' => 'Associate\'s Degree',
            'Bachelor\'s Degrees' => 'Bachelor\'s Degree',
            'Graduate Degrees' => 'Graduate Degree',
            'Master\'s Degrees' => 'Master\'s Degree',
            'Doctoral Degrees' => 'Doctoral Degree',
            'Professional Degrees' => 'Professional Degree',
        ];
    ?>

    <div class="education">
        <label>Education</label>
        <?php
        Modal::begin([
            'header' => '<h2>Education Details</h2>',
            'toggleButton' => ['label' => 'Add'],
        ]);
        ?>
        <div class="site-education">
            <?php $formEdu = ActiveForm::begin(); ?>

            <?= $formEdu->field($education, 'certificate_degree_name')->dropDownList($degree) ?>
            <?= $formEdu->field($education, 'major') ?>
            <?= $formEdu->field($education, 'Institute_university_name')->textInput() ?>
            <?= $formEdu->field($education, 'cgpa') ?>
            <?php
            echo $formEdu->field($education, 'starting_date')->widget(DatePicker::classname(), [
                'name' => 'starting_date',
                'language' => 'en-GB',
                'dateFormat' => 'dd-MM-yyyy',
                'options' => [
                    'changeMonth' => true,
                    'changeYear' => true,
                    'yearRange' => '1996:2099',
                ],
            ]);
            echo $formEdu->field($education, 'completion_date')->widget(DatePicker::classname(), [
                'name' => 'completion_date',
                'language' => 'en-GB',
                'dateFormat' => 'dd-MM-yyyy',
                'options' => [
                    'changeMonth' => true,
                    'changeYear' => true,
                    'yearRange' => '1996:2099',
                ],
            ]);
            ?>
            <?= Html::submitButton('Add', ['class' => 'btn btn-primary']) ?>
            <?php ActiveForm::end(); ?>

        </div><!-- site-education -->
        <?php
        Modal::end();
        ?>
    </div>

    <div class="site-experience">
        <label>Experience</label>
        <?php
        Modal::begin([
            'header' => '<h2>Experience Details</h2>',
            'toggleButton' => ['label' => 'Add'],
        ]);
        ?>

        <?php $formExp  = ActiveForm::begin(); ?>

        <?= $formExp->field($experience, 'is_current_job')->dropDownList(['No', 'Yes']) ?>
        <?php
        echo $formExp->field($experience, 'start_date')->widget(DatePicker::classname(), [
            'name' => 'start_date',
            'language' => 'en-GB',
            'dateFormat' => 'dd-MM-yyyy',
            'options' => [
                'changeMonth' => true,
                'changeYear' => true,
                'yearRange' => '1996:2099',
            ],
        ]);
        echo $formExp->field($experience, 'end_date')->widget(DatePicker::classname(), [
            'name' => 'end_date',
            'language' => 'en-GB',
            'dateFormat' => 'dd-MM-yyyy',
            'options' => [
                'changeMonth' => true,
                'changeYear' => true,
                'yearRange' => '1996:2099',
            ],
        ]);
        ?>
        <?= $formExp->field($experience, 'job_title') ?>
        <?= $formExp->field($experience, 'company_name') ?>
        <?= $formExp->field($experience, 'job_location_city') ?>
        <?= $formExp->field($experience, 'job_location_country') ?>
        <?= $formExp->field($experience, 'description')->textarea(['rows' => 4]) ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>

        <?php
        Modal::end();
        ?>

    </div><!-- site-experience -->

    <div>
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
