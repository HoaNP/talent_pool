<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tag_set".
 *
 * @property integer $id
 * @property integer $tag_name
 *
 * @property Preferences[] $preferences
 * @property StaffProfile[] $staff
 */
class TagSet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag_set';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tag_name'], 'required'],
            [['id', 'tag_name'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag_name' => 'Tag Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreferences()
    {
        return $this->hasMany(Preferences::className(), ['tag_set_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(StaffProfile::className(), ['staff_id' => 'staff_id'])->viaTable('preferences', ['tag_set_id' => 'id']);
    }
}
