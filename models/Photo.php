<?php

namespace app\models;

use Yii;

class Photo extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'photo';
    }

    public function rules()
    {
        return [
            [['proirity'], 'integer'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Изображение',
            'proirity' => 'Приоритет',
            'date' => 'Дата',
        ];
    }
}
