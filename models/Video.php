<?php

namespace app\models;

use Yii;

class Video extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'video';
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
            'name' => 'Видео',
            'proirity' => 'Приоритет',
            'date' => 'Дата',
        ];
    }
}
