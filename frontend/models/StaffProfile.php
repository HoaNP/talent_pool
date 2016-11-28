<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staff_profile".
 *
 * @property integer $staff_id
 * @property string $current_salary
 * @property string $contact_number
 * @property string $date_of_birth
 *
 * @property EducationDetail[] $educationDetails
 * @property ExperienceDetail[] $experienceDetails
 * @property Preferences[] $preferences
 * @property TagSet[] $tagSets
 * @property User $staff
 * @property StaffSkillSet[] $staffSkillSets
 * @property SkillSet[] $skillSets
 */
class StaffProfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staff_profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['staff_id'], 'required'],
            [['staff_id'], 'integer'],
            [['date_of_birth'], 'safe'],
            [['current_salary'], 'string', 'max' => 100],
            [['contact_number'], 'string', 'max' => 11],
            [['staff_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['staff_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'staff_id' => 'Staff ID',
            'current_salary' => 'Current Salary',
            'contact_number' => 'Contact Number',
            'date_of_birth' => 'Date Of Birth',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEducationDetails()
    {
        return $this->hasMany(EducationDetail::className(), ['staff_id' => 'staff_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExperienceDetails()
    {
        return $this->hasMany(ExperienceDetail::className(), ['staff_id' => 'staff_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreferences()
    {
        return $this->hasMany(Preferences::className(), ['staff_id' => 'staff_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagSets()
    {
        return $this->hasMany(TagSet::className(), ['id' => 'tag_set_id'])->viaTable('preferences', ['staff_id' => 'staff_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasOne(User::className(), ['id' => 'staff_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaffSkillSets()
    {
        return $this->hasMany(StaffSkillSet::className(), ['staff_id' => 'staff_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkillSets()
    {
        return $this->hasMany(SkillSet::className(), ['id' => 'skill_set_id'])->viaTable('staff_skill_set', ['staff_id' => 'staff_id']);
    }
}
