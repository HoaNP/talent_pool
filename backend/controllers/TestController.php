<?php
/**
 * Created by PhpStorm.
 * User: tungphung
 * Date: 19/12/16
 * Time: 9:34 AM
 */

namespace backend\controllers;

use yii\rest\ActiveController;

class TestController extends ActiveController
{
    public $modelCalss = 'common\models\User';

}