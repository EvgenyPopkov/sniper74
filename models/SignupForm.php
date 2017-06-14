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

    public function rules()
    {
        return [
            [['email', 'password', 'firstName','lastName', 'confirmPassword'], 'filter', 'filter'=>'trim'],
            [['email', 'password', 'firstName', 'lastName', 'confirmPassword'], 'required', 'message' => 'Обязательное поле'],
            ['email', 'email', 'message' => 'Некорректный email'],
            ['email','unique','targetClass'=>'app\models\User', 'message' => 'Такой email уже существует'],
            [['firstName', 'lastName', 'password', 'confirmPassword'], 'string', 'max' => 50, 'tooLong' => 'Максимальная длина 50 символов'],
            [['password', 'confirmPassword'], 'string', 'min' => 5, 'tooShort' => 'Минимальная длина 5 символов'],
            ['confirmPassword', 'compare', 'compareAttribute' => 'password', 'message' => 'Неверный пароль'],
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
