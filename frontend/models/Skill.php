<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "skill".
 *
 * @property integer $id
 * @property string $skill_name
 *
 * @property SkillSet[] $skillSets
 */
class Skill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['skill_name'], 'required'],
            [['skill_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'skill_name' => 'Skill Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkillSets()
    {
        return $this->hasMany(SkillSet::className(), ['skill_id' => 'id']);
    }

    public static function getSkillByName($name)
    {
        $skill = Skill::find()->where(['skill_name' => $name])->one();
        if (!$skill) {
            $skill = new Skill();
            $skill->skill_name = $name;
            $skill->save(false);
        }
        return $skill;
    }
}
