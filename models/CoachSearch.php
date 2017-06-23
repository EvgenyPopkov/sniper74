<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Coach;

/**
 * modelsCoachSearch represents the model behind the search form about `app\models\Coach`.
 */
class CoachSearch extends Coach
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'priority'], 'integer'],
            [['firstName', 'lastName', 'place', 'description', 'vk', 'image'], 'safe'],
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
        $query = Coach::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'priority' => $this->priority,
        ]);

        $query->andFilterWhere(['like', 'firstName', $this->firstName])
            ->andFilterWhere(['like', 'lastName', $this->lastName])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'vk', $this->vk])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
