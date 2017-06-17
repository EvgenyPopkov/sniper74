<?php

namespace app\models;

use Yii;

class Sbor extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'sbor';
    }

    public function rules()
    {
        return [
            [['dateBegin', 'dateEnd'], 'safe'],
            [['description'], 'string'],
            [['status', 'priority'], 'integer'],
            [['head', 'price', 'image'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dateBegin' => 'Дата начала',
            'dateEnd' => 'Дата окончания',
            'head' => 'Название',
            'description' => 'Описание',
            'price' => 'Цена',
            'image' => 'Изображение',
            'status' => 'Статус',
            'priority' => 'Приоритет',
        ];
    }
}
