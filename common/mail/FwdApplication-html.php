<?php
/**
 * Created by PhpStorm.
 * User: tungphung
 * Date: 13/12/16
 * Time: 10:36 AM
 */
use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<p> Dear Mr/Mrs <?= Html::encode($officer->username) ?>, </p>
There is a application for <?= $project->project_name?> project.
<?= $user->username?> is very interested in applying for <?= $project->project_name?> project you posted on Talent Pool recently. We think his/her qualifications and experience match your specifications almost exactly.
Please take a moment to review our attached Application Documents:
<br>
<div class="user-view">
    <?= DetailView::widget([
        'model' => $user,
        'attributes' => [
            [
                'attribute' => 'summary',
                'format' => 'raw',
            ],
            [
                'attribute' => 'education',
                'format' => 'raw',
            ],
            [
                'attribute' => 'experience',
                'format' => 'raw',
            ],
            [
                'label' => "My Talent",
                'format' => 'raw',
                'attribute' => function ($model){
                    $s = "";
                    foreach ($model->skills as $t){
                        $s = $s . $t->skill_name . "<br>";
                    }
                    return $s;

                }
            ],
            'email:email',
        ],
    ]) ?>
</div>

It would be a sincere pleasure to hear back from you soon to discuss this exciting opportunity.

Sincerely,


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


