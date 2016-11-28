<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "skill_set".
 *
 * @property integer $id
 * @property string $skill_set_name
 *
 * @property ProjectRequiredSkillSet[] $projectRequiredSkillSets
 * @property Project[] $projectPosts
 * @property StaffSkillSet[] $staffSkillSets
 * @property StaffProfile[] $staff
 */
class SkillSet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skill_set';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'skill_set_name'], 'required'],
            [['id'], 'integer'],
            [['skill_set_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'skill_set_name' => 'Skill Set Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectRequiredSkillSets()
    {
        return $this->hasMany(ProjectRequiredSkillSet::className(), ['skill_set_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectPosts()
    {
        return $this->hasMany(Project::className(), ['id' => 'project_post_id'])->viaTable('project_required_skill_set', ['skill_set_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaffSkillSets()
    {
        return $this->hasMany(StaffSkillSet::className(), ['skill_set_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(StaffProfile::className(), ['staff_id' => 'staff_id'])->viaTable('staff_skill_set', ['skill_set_id' => 'id']);
    }
}
