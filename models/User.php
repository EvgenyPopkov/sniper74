<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'user';
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'Имя',
            'lastName' => 'Фамилия',
            'email' => 'Email',
            'phone' => 'Телефон',
            'dateRegister' => 'Дата регистрации',
        ];
    }


    public static function createUser($model)
    {
      $user = new User();
      $user->firstName = $model->firstName;
      $user->lastName = $model->lastName;
      $user->email = $model->email;
      $user->phone = $model->phone;
      $user->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
      $user->dateRegister = date("Y-m-d");
      $user->authKey = Yii::$app->security->generateRandomString();
      return $user->save();
    }

    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = NULL)
    {
    }

    public static function findByUsername($email)
    {
        return User::findOne(['email' => $email]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public function getEntrys()
    {
        return $this->hasMany(Entry::className(), ['idUser' => 'id'])->where('date >= :date')->addParams([':date' => date("Y-m-d")])->orderBy('date');
    }

    public function getSbores()
    {
        return $this->hasMany(EntrySbor::className(), ['idUser' => 'id']);
    }

    public function isAllowed()
    {
        return $this->isAdmin;
    }
    public function allow()
    {
        $this->isAdmin = 1;
        return $this->save(false);
    }
    public function disallow()
    {
        $this->isAdmin = 0;
        return $this->save(false);
    }
}
