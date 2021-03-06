<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $project_name
 * @property string $job_type
 * @property string $project_summary
 * @property string $project_photo
 * @property string $requirement
 * @property string $salary_range
 * @property string $is_active
 * @property string $created_at
 * @property string $info
 *
 * @property ApplyActivity[] $applyActivities
 * @property Comment[] $comments
 * @property User $user
 * @property TagSet[] $tagSets
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'project_name', 'job_type', 'project_summary', 'requirement', 'salary_range'], 'required'],
            [['user_id'], 'integer'],
            [['requirement', 'info'], 'string'],
            [['created_at'], 'safe'],
            [['project_name'], 'string', 'max' => 50],
            [['job_type'], 'string', 'max' => 20],
            [['project_summary'], 'string', 'max' => 1500],
            [['project_photo'], 'string', 'max' => 200],
            [['salary_range'], 'string', 'max' => 100],
            [['is_active'], 'string', 'max' => 1],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'project_name' => 'Project Name',
            'job_type' => 'Job Type',
            'project_summary' => 'Project Summary',
            'project_photo' => 'Project Photo',
            'requirement' => 'Requirement',
            'salary_range' => 'Salary Range',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
            'info' => 'Info',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplyActivities()
    {
        return $this->hasMany(ApplyActivity::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['project_id' => 'id']);
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
    public function getTagSets()
    {
        return $this->hasMany(TagSet::className(), ['project_id' => 'id']);
    }
}
