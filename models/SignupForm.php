<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SignupForm extends Model
{
    public $firstName;
    public $lastName;
    public $phone;
    public $email;
    public $password;
    public $confirmPassword;

    public function rules()
    {
        return [
            [['password', 'firstName','lastName', 'confirmPassword'], 'filter', 'filter'=>'trim'],
            [['password', 'firstName', 'lastName', 'confirmPassword','phone'], 'required'],
            [['firstName', 'lastName', 'password', 'confirmPassword'], 'string', 'max' => 50],
            [['password', 'confirmPassword'], 'string', 'min' => 5],
            ['confirmPassword', 'compare', 'compareAttribute' => 'password'],

        ];
    }

    public function attributeLabels()
    {
        return [
            'firstName' => 'Имя',
            'lastName' => 'Фамилия',
            'phone' => 'Номер телефона',
            'password' => 'Пароль',
            'confirmPassword' => 'Подтвеждение пароля',
        ];
    }

    public function signup($email)
    {
        if ($this->validate()){
          $this->email = $email;
          if(User::createUser($this)) {
              if (RegisterWait::findOne(['email' => $email])) {
                $wait = RegisterWait::findOne(['email' => $email]);
                $wait->delete();
              }

              if(!Subscribe::ValidEmail($email)){
                $sub = new Subscribe();
                $sub->email = $email;
                $sub->save();
              }
              return $this->login();
          }
          return false;
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
