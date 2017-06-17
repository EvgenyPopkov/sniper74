<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SendpasswordForm extends Model
{
    public $email;

    private $_user = false;

    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'validateEmail'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Email'
        ];
    }

    public function validateEmail($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user) {
                $this->addError($attribute, 'Неправильный email');
            }
        }
    }

    public function sendPassword($user, $pass){
        return Yii::$app->mailer->compose('repairPassword', ['user' => $user, 'pass' => $pass])
          ->setFrom([Yii::$app->params['adminEmail'] => 'Хоккейный центр Sniper'])
          ->setTo($user->email)
          ->setSubject('Восстановление пароля')
          ->send();
    }

    public function repairPassword(){
        if ($user = $this->getUser()){

            $pass = $this->genPassword();
            $user->password = Yii::$app->getSecurity()->generatePasswordHash($pass);

            if ($this->sendPassword($user, $pass)){

                return $user->save();
            }
            return false;
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

    public function genPassword ($length = 6) {
       $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
       $length = intval($length);
       $size = strlen($chars)-1;
       $password = "";
       while($length--) $password.=$chars[rand(0,$size)];
       $pass = $password;
       return $password;
   }
}
