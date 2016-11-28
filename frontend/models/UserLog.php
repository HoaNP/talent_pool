<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_log".
 *
 * @property integer $user_id
 * @property string $last_login_date
 * @property string $last_job_apply_date
 *
 * @property User $user
 */
class UserLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'last_login_date'], 'required'],
            [['user_id'], 'integer'],
            [['last_login_date', 'last_job_apply_date'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'last_login_date' => 'Last Login Date',
            'last_job_apply_date' => 'Last Job Apply Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
