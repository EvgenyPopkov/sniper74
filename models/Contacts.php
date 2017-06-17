<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Contacts extends Model
{
  public $address;
  public $phone;
  public $email;
  public $vk;
  public $instagram;
  public $youtube;
  public $name;

  public function rules()
  {
      return [
          [['name', 'email', 'address', 'phone', 'vk', 'instagram', 'youtube'], 'required', 'message' => 'Обязательное поле'],
      ];
  }

  public function getContacts()
  {
      return json_decode(file_get_contents("../web/information/contact.json"), true);;
  }
}
