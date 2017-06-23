<?php

namespace app\models;

use Yii;

class RegisterWait extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'register_wait';
    }

    public function rules()
    {
        return [
            [['email'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'date' => 'Дата',
        ];
    }

    public function AddUser($model)
    {
        $this->email = $model->email;
        $this->date = date('Y-m-d');
        return $this->save();
    }
}
