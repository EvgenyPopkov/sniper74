<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TimeTraining;

class TimeTrainingSearch extends TimeTraining
{
    public function rules()
    {
        return [
            [['id', 'idTraining', 'idAddress'], 'integer'],
            [['begin', 'end'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = TimeTraining::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'idTraining' => $this->idTraining,
            'idAddress' => $this->idAddress,
        ]);

        $query->andFilterWhere(['like', 'begin', $this->begin])
            ->andFilterWhere(['like', 'end', $this->end]);

        return $dataProvider;
    }
}
