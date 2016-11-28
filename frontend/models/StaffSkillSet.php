<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staff_skill_set".
 *
 * @property integer $staff_id
 * @property integer $skill_set_id
 * @property integer $skill_level
 * @property string $last_used
 * @property integer $experience_year
 *
 * @property SkillSet $skillSet
 * @property StaffProfile $staff
 */
class StaffSkillSet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staff_skill_set';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['staff_id', 'skill_set_id', 'skill_level', 'last_used', 'experience_year'], 'required'],
            [['staff_id', 'skill_set_id', 'skill_level', 'experience_year'], 'integer'],
            [['last_used'], 'safe'],
            [['skill_set_id'], 'exist', 'skipOnError' => true, 'targetClass' => SkillSet::className(), 'targetAttribute' => ['skill_set_id' => 'id']],
            [['staff_id'], 'exist', 'skipOnError' => true, 'targetClass' => StaffProfile::className(), 'targetAttribute' => ['staff_id' => 'staff_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'staff_id' => 'Staff ID',
            'skill_set_id' => 'Skill Set ID',
            'skill_level' => 'Skill Level',
            'last_used' => 'Last Used',
            'experience_year' => 'Experience Year',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkillSet()
    {
        return $this->hasOne(SkillSet::className(), ['id' => 'skill_set_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasOne(StaffProfile::className(), ['staff_id' => 'staff_id']);
    }
}
