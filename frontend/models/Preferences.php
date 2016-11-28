<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "preferences".
 *
 * @property integer $staff_id
 * @property integer $tag_set_id
 *
 * @property StaffProfile $staff
 * @property TagSet $tagSet
 */
class Preferences extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'preferences';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['staff_id', 'tag_set_id'], 'required'],
            [['staff_id', 'tag_set_id'], 'integer'],
            [['staff_id'], 'exist', 'skipOnError' => true, 'targetClass' => StaffProfile::className(), 'targetAttribute' => ['staff_id' => 'staff_id']],
            [['tag_set_id'], 'exist', 'skipOnError' => true, 'targetClass' => TagSet::className(), 'targetAttribute' => ['tag_set_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'staff_id' => 'Staff ID',
            'tag_set_id' => 'Tag Set ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasOne(StaffProfile::className(), ['staff_id' => 'staff_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagSet()
    {
        return $this->hasOne(TagSet::className(), ['id' => 'tag_set_id']);
    }
}
