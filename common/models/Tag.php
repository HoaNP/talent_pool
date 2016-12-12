<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tag".
 *
 * @property integer $id
 * @property string $tag_name
 *
 * @property TagSet[] $tagSets
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag_name'], 'required'],
            [['tag_name'], 'string', 'max' => 30],
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

    public static function getTagByName($name)
    {
        $tag = Tag::find()->where(['tag_name' => $name])->one();
        if (!$tag) {
            $tag = new Tag();
            $tag->tag_name = $name;
            $tag->save(false);
        }
        return $tag;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagSets()
    {
        return $this->hasMany(TagSet::className(), ['tag_id' => 'id']);
    }
}