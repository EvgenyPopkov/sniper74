<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sbor;

class SborSearch extends Sbor
{
    public function rules()
    {
        return [
            [['id', 'priority'], 'integer'],
            [['dateBegin', 'dateEnd', 'head', 'description', 'price', 'image'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Sbor::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'dateBegin' => $this->dateBegin,
            'dateEnd' => $this->dateEnd,
            'priority' => $this->priority,
        ]);

        $query->andFilterWhere(['like', 'head', $this->head])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
