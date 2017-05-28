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
            ['email', 'required', 'message' => 'Обязательное поле'],
            ['email', 'email', 'message' => 'Некорректный email'],
            ['email', 'validateEmail'],
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

    public function sendPassword($user, $password){
        return Yii::$app->mailer->compose()
          ->setFrom('sniper74hockeycenter@gmail.com')
          ->setTo($user->email)
          ->setSubject('Тема сообщения')
          ->setTextBody('Текст сообщения')
          ->setHtmlBody('<b><?=$password?></b>')
          ->send();
    }

    public function repairPassword(){
        if ($user = $this->getUser()){


            $user->password = Yii::$app->getSecurity()->generatePasswordHash($this->genPassword());

            if ($this->sendPassword($user, $user->password)){

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

    public function genPassword ($length = 8) {
       $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP123456789@$#";
       $length = intval($length);
       $size = strlen($chars)-1;
       $password = "";
       while($length--) $password.=$chars[rand(0,$size)];
       return $password;
   }
}
