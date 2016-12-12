<?php
/**
 * Created by PhpStorm.
 * User: tungphung
 * Date: 12/12/16
 * Time: 2:54 PM
 */
namespace common\models;

use yii\db\ActiveRecord;
use common\models\User;
use common\models\Project;

class CommonFunction extends ActiveRecord
{
    public function getProjectNumber()
    {
        return (Project::find()->count());
    }

    public function getStaffNumber()
    {
        return(User::find()->where(['role' => User::ROLE_STAFF])->count());

    }
}