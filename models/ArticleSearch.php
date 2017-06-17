<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Article;

class ArticleSearch extends Article
{
    public function rules()
    {
        return [
            [['id', 'idCategory', 'viewed'], 'integer'],
            [['title', 'description', 'content', 'date', 'image', 'video'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Article::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'idCategory' => $this->idCategory,
            'date' => $this->date,
            'viewed' => $this->viewed,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'video', $this->video]);

        return $dataProvider;
    }
}
