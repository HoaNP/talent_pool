<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project_required_skill_set".
 *
 * @property integer $skill_set_id
 * @property integer $project_post_id
 * @property integer $skill_level
 *
 * @property Project $projectPost
 * @property SkillSet $skillSet
 */
class ProjectRequiredSkillSet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_required_skill_set';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['skill_set_id', 'project_post_id', 'skill_level'], 'required'],
            [['skill_set_id', 'project_post_id', 'skill_level'], 'integer'],
            [['project_post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_post_id' => 'id']],
            [['skill_set_id'], 'exist', 'skipOnError' => true, 'targetClass' => SkillSet::className(), 'targetAttribute' => ['skill_set_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'skill_set_id' => 'Skill Set ID',
            'project_post_id' => 'Project Post ID',
            'skill_level' => 'Skill Level',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectPost()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_post_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkillSet()
    {
        return $this->hasOne(SkillSet::className(), ['id' => 'skill_set_id']);
    }
}
