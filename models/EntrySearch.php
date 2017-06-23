<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Entry;

class EntrySearch extends Entry
{
    public function rules()
    {
        return [
            [['id', 'idTime', 'idUser'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Entry::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'idTime' => $this->idTime,
            'idUser' => $this->idUser,
            'date' => $this->date,
        ]);

        return $dataProvider;
    }
}
