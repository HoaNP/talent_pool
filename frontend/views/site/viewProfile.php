<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users'];

?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if (Yii::$app->user->identity->getId() === $model->id) {
            echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
        }
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email:email',
            'user_image',
            'summary',
            'education',
            'experience',
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
