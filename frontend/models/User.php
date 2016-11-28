<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property integer $user_type_id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $is_active
 * @property string $email_notification_active
 * @property resource $user_image
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Message[] $messages
 * @property MessageRecipient[] $messageRecipients
 * @property Project[] $projects
 * @property ProjectPostActivity[] $projectPostActivities
 * @property Project[] $projectPosts
 * @property StaffProfile $staffProfile
 * @property UserType $userType
 * @property UserLog $userLog
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_type_id', 'username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['user_type_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['user_image'], 'string'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['is_active', 'email_notification_active'], 'string', 'max' => 1],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['user_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserType::className(), 'targetAttribute' => ['user_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_type_id' => 'User Type ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'is_active' => 'Is Active',
            'email_notification_active' => 'Email Notification Active',
            'user_image' => 'User Image',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['creator_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessageRecipients()
    {
        return $this->hasMany(MessageRecipient::className(), ['recipient_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['posted_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectPostActivities()
    {
        return $this->hasMany(ProjectPostActivity::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectPosts()
    {
        return $this->hasMany(Project::className(), ['id' => 'project_post_id'])->viaTable('project_post_activity', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaffProfile()
    {
        return $this->hasOne(StaffProfile::className(), ['staff_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserType()
    {
        return $this->hasOne(UserType::className(), ['id' => 'user_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserLog()
    {
        return $this->hasOne(UserLog::className(), ['user_id' => 'id']);
    }
}
