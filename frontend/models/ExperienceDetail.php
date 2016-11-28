<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "experience_detail".
 *
 * @property integer $staff_id
 * @property string $is_current_job
 * @property string $start_date
 * @property string $end_date
 * @property string $job_title
 * @property string $company_name
 * @property string $job_location_city
 * @property string $job_location_country
 * @property string $description
 *
 * @property StaffProfile $staff
 */
class ExperienceDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'experience_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['staff_id', 'is_current_job', 'start_date', 'end_date', 'job_title', 'company_name', 'job_location_city', 'job_location_country', 'description'], 'required'],
            [['staff_id'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['is_current_job'], 'string', 'max' => 1],
            [['job_title', 'job_location_city', 'job_location_country'], 'string', 'max' => 50],
            [['company_name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 4000],
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
            'is_current_job' => 'Is Current Job',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'job_title' => 'Job Title',
            'company_name' => 'Company Name',
            'job_location_city' => 'Job Location City',
            'job_location_country' => 'Job Location Country',
            'description' => 'Description',
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
