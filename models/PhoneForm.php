<?php

namespace app\models;

use Yii;
use yii\base\Model;

class PhoneForm extends Model
{
    public $phone;

    public function rules()
    {
        return [
          ['phone', 'required']
        ];
    }

    public function attributeLabels()
    {
        return [
            'phone' => 'Номер телефона'
        ];
    }
}
