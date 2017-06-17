<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RepairPasswordForm extends Model
{
    public $old;
    public $new;
    public $confirm;

    private $_user = false;

    public function rules()
    {
        return [
          [['old', 'new', 'confirm'], 'filter', 'filter'=>'trim'],
          [['old', 'new', 'confirm'], 'required'],
          [['old', 'new', 'confirm'], 'string', 'min' => 5],
          ['old', 'validatePassword'],
          ['confirmP', 'compare', 'compareAttribute' => 'new'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'old' => 'Текущий пароль',
            'new' => 'Новый пароль',
            'confirm' => 'Подтверждение пароля'
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user->validatePassword($this->old)) {
                $this->addError($attribute, 'Неправильный пароль');
            }
        }
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->email);
        }

        return $this->_user;
    }

    
}
