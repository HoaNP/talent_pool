<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "experience_detail".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $is_current_job
 * @property string $start_date
 * @property string $end_date
 * @property string $job_title
 * @property string $company_name
 * @property string $job_location_city
 * @property string $job_location_country
 * @property string $description
 *
 * @property User $user
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
            [['user_id', 'is_current_job', 'start_date', 'end_date', 'job_title', 'company_name', 'job_location_city', 'job_location_country', 'description'], 'required'],
            [['user_id'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['is_current_job'], 'string', 'max' => 1],
            [['job_title', 'job_location_city', 'job_location_country'], 'string', 'max' => 50],
            [['company_name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 4000],
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
