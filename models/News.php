<?php

namespace app\models;

use Yii;

class News extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'news';
    }

    public function rules()
    {
        return [
            [['content'], 'string'],
            [['priority'], 'integer'],
            [['date'], 'safe'],
            [['name', 'image'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'content' => 'Текст',
            'image' => 'Изображение',
            'priority' => 'Приоритет',
            'date' => 'Дата',
        ];
    }
}
