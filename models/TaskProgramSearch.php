<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TaskProgram;

class TaskProgramSearch extends TaskProgram
{
    public function rules()
    {
        return [
            [['idTask', 'idProgram'], 'integer'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = TaskProgram::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idTask' => $this->idTask,
            'idProgram' => $this->idProgram,
        ]);

        return $dataProvider;
    }
}
