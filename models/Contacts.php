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

  public function getContacts()
  {
      return Contacts::findOne(['id' => 1]);
  }
}
