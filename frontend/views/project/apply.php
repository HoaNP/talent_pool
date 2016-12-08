<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Thank you ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thank-you">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Thank you so much for your submission.
        We’ll be in touch shortly.
        Have a great day ahead!
    </p>
    <a href="?r=project/index">Go to homepage</a>

</div>
