<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Project;

/**
 * ProjectSearch represents the model behind the search form about `common\models\Project`.
 */
class ProjectSearch extends Project
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['project_name', 'user_id', 'job_type', 'project_summary', 'project_photo', 'requirement', 'salary_range', 'is_active', 'created_at', 'tag_ids'],  'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Project::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('user');
        $query->joinWith('tags');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
//            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'project_name', $this->project_name])
            ->andFilterWhere(['like', 'job_type', $this->job_type])
            ->andFilterWhere(['like', 'project_summary', $this->project_summary])
            ->andFilterWhere(['like', 'project_photo', $this->project_photo])
            ->andFilterWhere(['like', 'requirement', $this->requirement])
            ->andFilterWhere(['like', 'salary_range', $this->salary_range])
            ->andFilterWhere(['like', 'user.username', $this->user_id])
            ->andFilterWhere(['like', 'tag.id', $this->tag_ids])
            ->andFilterWhere(['like', 'is_active', $this->is_active]);

        return $dataProvider;
    }
}