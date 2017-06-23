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
            ['email','required'],
            [['date'], 'default', 'value' => date('Y-m-d')],
            [['status'], 'integer'],
            [['email'], 'email'],
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

    public function ValidEmail($email)
    {
      return Subscribe::findOne(['email' => $email]);
    }

    public function isAllowed()
    {
        return $this->status;
    }
    public function allow()
    {
        $this->status = 1;
        return $this->save(false);
    }
    public function disallow()
    {
        $this->status = 0;
        return $this->save(false);
    }
}
