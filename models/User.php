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

    public static function createUser($model)
    {
      $user = new User();
      $user->firstName = $model->firstName;
      $user->lastName = $model->lastName;
      $user->email = $model->email;
      $user->phone = $model->phone;
      $user->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
      $user->dateRegister = date("Y-m-d H:i:s");
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
}
