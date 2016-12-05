<?php
/**
 * Created by PhpStorm.
 * User: tungphung
 * Date: 2/12/16
 * Time: 9:32 PM
 */

namespace app\models;


class UserContact extends \yii\db\ActiveRecord
{
    const TYPE_OTHER = 0;
    const TYPE_PHONE = 10;
    const TYPE_SKYPE = 20;
    const TYPE_FACEBOOK = 30;
    const TYPE_GOOGLE = 40;
    const TYPE_MSN = 50;



    public function getUserContactType($data) {
        $options = $this->getUserContactTypeOptions();
        return $options[$data];
    }

    public function getUserContactTypeOptions()
    {
        return array(
            self::TYPE_PHONE => 'Phone',
            self::TYPE_SKYPE => 'Skype',
            self::TYPE_OTHER => 'Other',
            self::TYPE_FACEBOOK => 'Facebook Messenger',
            self::TYPE_GOOGLE => 'Google Talk',
            self::TYPE_MSN => 'MSN Messenger',
        );
    }
}