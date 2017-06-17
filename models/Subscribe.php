<?php

namespace app\models;

use Yii;

class Subscribe extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'subscribe';
    }

    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['status'], 'integer'],
            [['email'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'date' => 'Дата',
            'status' => 'Статус',
        ];
    }
}
