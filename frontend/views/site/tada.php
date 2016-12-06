<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users'];

?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'email:email',
            'user_image',
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
