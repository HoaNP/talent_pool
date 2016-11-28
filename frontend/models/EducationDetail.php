<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "education_detail".
 *
 * @property integer $staff_id
 * @property string $certificate_degree_name
 * @property string $major
 * @property string $Institute_university_name
 * @property string $starting_date
 * @property string $completion_date
 * @property integer $cgpa
 *
 * @property StaffProfile $staff
 */
class EducationDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'education_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['staff_id', 'certificate_degree_name', 'major', 'Institute_university_name', 'starting_date'], 'required'],
            [['staff_id', 'cgpa'], 'integer'],
            [['starting_date', 'completion_date'], 'safe'],
            [['certificate_degree_name', 'major', 'Institute_university_name'], 'string', 'max' => 50],
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
            'certificate_degree_name' => 'Certificate Degree Name',
            'major' => 'Major',
            'Institute_university_name' => 'Institute University Name',
            'starting_date' => 'Starting Date',
            'completion_date' => 'Completion Date',
            'cgpa' => 'Cgpa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasOne(StaffProfile::className(), ['staff_id' => 'staff_id']);
    }
}
