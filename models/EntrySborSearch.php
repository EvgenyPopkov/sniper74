<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EntrySbor;

class EntrySborSearch extends EntrySbor
{
    public function rules()
    {
        return [
            [['id', 'idSbor', 'idUser'], 'integer'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = EntrySbor::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'idSbor' => $this->idSbor,
            'idUser' => $this->idUser,
        ]);

        return $dataProvider;
    }
}
