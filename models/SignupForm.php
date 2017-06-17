<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SignupForm extends Model
{
    public $firstName;
    public $lastName;
    public $email;
    public $phone;
    public $password;
    public $confirmPassword;
    public $verifyCode;

    public function rules()
    {
        return [
            [['email', 'password', 'firstName','lastName', 'confirmPassword'], 'filter', 'filter'=>'trim'],
            [['email', 'password', 'firstName', 'lastName', 'confirmPassword'], 'required'],
            ['email', 'email'],
            ['email','unique','targetClass'=>'app\models\User'],
            [['firstName', 'lastName', 'password', 'confirmPassword'], 'string', 'max' => 50],
            [['password', 'confirmPassword'], 'string', 'min' => 5],
            ['confirmPassword', 'compare', 'compareAttribute' => 'password'],
            ['verifyCode', 'captcha']
        ];
    }

    public function attributeLabels()
    {
        return [
            'firstName' => 'Имя',
            'lastName' => 'Фамилия',
            'email' => 'Email',
            'phone' => 'Телефон',
            'password' => 'Пароль',
            'confirmPassword' => 'Подтвеждение пароля',
            '$verifyCode' => 'Проверочный код',
        ];
    }

    public function signup()
    {
        if ($this->validate() && User::createUser($this)) {
            return $this->login();
        }

        return false;
    }

    public function login()
    {
        return Yii::$app->user->login($this->getUser());
    }

    public function getUser()
    {
        return User::findByUsername($this->email);
    }

}
