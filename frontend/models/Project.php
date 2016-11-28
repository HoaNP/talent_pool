<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property integer $id
 * @property integer $project_type_id
 * @property integer $posted_by_id
 * @property string $project_name
 * @property string $project_summary
 * @property string $project_photo
 * @property string $responsibilities
 * @property string $salary_range
 * @property string $is_active
 * @property string $created_date
 *
 * @property ProjectType $projectType
 * @property User $postedBy
 * @property ProjectPostActivity[] $projectPostActivities
 * @property User[] $userAccounts
 * @property ProjectRequiredSkillSet[] $projectRequiredSkillSets
 * @property SkillSet[] $skillSets
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
            [['id', 'project_type_id', 'posted_by_id', 'project_name', 'project_summary', 'responsibilities', 'salary_range', 'is_active', 'created_date'], 'required'],
            [['id', 'project_type_id', 'posted_by_id'], 'integer'],
            [['created_date'], 'safe'],
            [['project_name'], 'string', 'max' => 50],
            [['project_summary', 'responsibilities'], 'string', 'max' => 500],
            [['project_photo'], 'string', 'max' => 200],
            [['salary_range'], 'string', 'max' => 100],
            [['is_active'], 'string', 'max' => 1],
            [['project_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectType::className(), 'targetAttribute' => ['project_type_id' => 'id']],
            [['posted_by_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['posted_by_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_type_id' => 'Project Type ID',
            'posted_by_id' => 'Posted By ID',
            'project_name' => 'Project Name',
            'project_summary' => 'Project Summary',
            'project_photo' => 'Project Photo',
            'responsibilities' => 'Responsibilities',
            'salary_range' => 'Salary Range',
            'is_active' => 'Is Active',
            'created_date' => 'Created Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectType()
    {
        return $this->hasOne(ProjectType::className(), ['id' => 'project_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'posted_by_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectPostActivities()
    {
        return $this->hasMany(ProjectPostActivity::className(), ['project_post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAccounts()
    {
        return $this->hasMany(User::className(), ['id' => 'user_account_id'])->viaTable('project_post_activity', ['project_post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectRequiredSkillSets()
    {
        return $this->hasMany(ProjectRequiredSkillSet::className(), ['project_post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkillSets()
    {
        return $this->hasMany(SkillSet::className(), ['id' => 'skill_set_id'])->viaTable('project_required_skill_set', ['project_post_id' => 'id']);
    }
}
