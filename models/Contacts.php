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

  public function attributeLabels()
  {
      return [
          'name' => 'Контактное лицо',
          'email' => 'Email',
          'address' => 'Адрес',
          'phone' => 'Телефон',
          'vk' => 'Вконтакте',
          'instagram' => 'Instagram',
          'youtube' => 'Youtube',
      ];
  }


  public function getJson()
  {
      return json_decode(file_get_contents("../web/information/contact.json"), true);;
  }

  public function getContacts()
  {
      if ($model = $this->getJson()) {
          $this->address = $model['address'];
          $this->phone = $model['phone'];
          $this->email = $model['email'];
          $this->vk = $model['vk'];
          $this->instagram = $model['instagram'];
          $this->youtube = $model['youtube'];
          $this->name = $model['name'];
          return true;
      }
      return false;
  }

  public function savePage()
  {
      $file = file_get_contents("../web/information/contact.json");
      $taskList = json_decode($file, TRUE);
      $taskList =  array('address' => $this->address, 'phone' => $this->phone,
      'vk' => $this->vk, 'email' => $this->email, 'instagram' => $this->instagram, 'youtube' => $this->youtube, 'name' => $this->name);
      return file_put_contents("../web/information/contact.json", json_encode($taskList));
  }
}
