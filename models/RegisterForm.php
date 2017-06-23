<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
    public $email;
    public $verifyCode;

    public function rules()
    {
        return [
            [['email'], 'filter', 'filter'=>'trim'],
            [['email'], 'required'],
            ['email', 'email'],
            ['email','unique','targetClass'=>'app\models\User'],
            ['email','validWait'],
            ['verifyCode', 'captcha'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Email',
        ];
    }

    public function validWait($attribute)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if ($user) {
                $this->addError($attribute, 'Пользователь с таким email уже зарегистрирован');
            }
        }
    }

    public function getUser()
    {
      return RegisterWait::findOne(['email' => $this->email]);
    }


    public function SendRegister()
    {
      return Yii::$app->mailer->compose('register', ['email' => $this->email])
        ->setFrom([Yii::$app->params['adminEmail'] => 'Хоккейный центр Sniper'])
        ->setTo($this->email)
        ->setSubject('Регистрация')
        ->send();
    }

    public function Register()
    {
        return $this->SendRegister();
    }

}
