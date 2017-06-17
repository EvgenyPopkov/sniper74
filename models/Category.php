<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

class Category extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'count' => 'Количество статей',
        ];
    }

    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['idCategory' => 'id']);
    }

    public function getAll()
    {
        return Category::find()->where('count > 0')->orderBy('count desc')->all();
    }

    public function CountAdd($id)
    {
        $value = Category::findOne(['id' => $id]);
        $value->count++;
        $value->save(false);
    }

    public function CountRemove($id)
    {
        $value = Category::findOne(['id' => $id]);
        $value->count--;
        $value->save(false);
    }

    public function getArticlesByCategory($id)
    {
        $query = Article::find()->where(['idCategory'=>$id]);
        $count = $query->count();
        if ($count < 1) return false;
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>3]);
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $data['articles'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }
}
