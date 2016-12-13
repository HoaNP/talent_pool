<?php
/**
 * Created by PhpStorm.
 * User: tungphung
 * Date: 13/12/16
 * Time: 3:02 PM
 */
?>
Dear Mr/Mrs <?= ($officer->username) ?>,
There is a application for <?= $project->project_name?> project.
<?= $user->username?> is very interested in applying for <?= $project->project_name?> project you posted on Talent Pool recently. We think his/her qualifications and experience match your specifications almost exactly.

Please take a moment to review our attached Application Documents:
<div class="user-view">


    <?= DetailView::widget([
        'model' => $user,
        'attributes' => [
            'username',
            'email:email',
            'user_image',
            'summary',
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
        ],
    ]) ?>

</div>
<?= $user->summary?>
<?= $user->education ?>
<?= $user->experience ?>
<?= $user->email?>
<?php
foreach ($user->skills as $t){
    echo $t->skill_name . '\n';
}
?>

It would be a sincere pleasure to hear back from you soon to discuss this exciting opportunity.

Sincerely,
