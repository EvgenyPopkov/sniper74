<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Comment;

class CommentSearch extends Comment
{
    public function rules()
    {
        return [
            [['id', 'idArticle', 'idUser', 'status'], 'integer'],
            [['text', 'date'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Comment::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'idArticle' => $this->idArticle,
            'idUser' => $this->idUser,
            'date' => $this->date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
