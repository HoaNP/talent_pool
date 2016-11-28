<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project_post_activity".
 *
 * @property integer $user_id
 * @property integer $project_post_id
 * @property string $apply_date
 *
 * @property User $user
 * @property Project $projectPost
 */
class ProjectPostActivity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_post_activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'project_post_id', 'apply_date'], 'required'],
            [['user_id', 'project_post_id'], 'integer'],
            [['apply_date'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['project_post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_post_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'project_post_id' => 'Project Post ID',
            'apply_date' => 'Apply Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectPost()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_post_id']);
    }
}
