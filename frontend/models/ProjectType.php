<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project_type".
 *
 * @property integer $id
 * @property string $project_type
 *
 * @property Project[] $projects
 */
class ProjectType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'project_type'], 'required'],
            [['id'], 'integer'],
            [['project_type'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_type' => 'Project Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['project_type_id' => 'id']);
    }

    public static function getProjectTypeByName($project_type){
        $type = ProjectType::find()->where(['project_type' => $project_type])->one();
        if (!$type) {
            $type = new ProjectType();
            $type->project_type = $project_type;
            $type->save();
        }
        return $type;
    }
}
