<?php

/**
 * Created by PhpStorm.
 * User: tungphung
 * Date: 19/12/16
 * Time: 2:25 PM
 */
namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';


}