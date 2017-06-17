<?php

namespace app\models;

use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    public function rules()
    {
        return [
            [['email', 'password'], 'filter', 'filter' => 'trim'],
            [['email', 'password'], 'required'],
            ['email', 'email'],
            ['password', 'validatePassword'],
            ['rememberMe', 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'password' => 'Пароль'
        ];
    }

    public function validateEmail($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user) {
                return false;
            }
            return true;
        }
        return false;
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user){
                $this->addError($attribute, 'Неправильный email или пароль');
            }
            elseif (!$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Неправильный email или пароль');
            }
        }
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->email);
        }

        return $this->_user;
    }
}
