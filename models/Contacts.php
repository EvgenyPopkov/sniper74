<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Contacts extends ActiveRecord
{
  public static function tableName()
  {
      return 'contact';
  }

  public function getContacst($id = 1)
  {
      return Contacts::findOne(['id' => $id]);
  }

  public function updateContacts($newcontact){
      $contact = Contacts::findOne(['id' => $id]);
      $contact = $newcontact;
      return $contact->save();
  }
}
