<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class KeyWordAddress extends ActiveRecord
{
  public static function tableName()
  {
      return 'key_word_address';
  }

  public function getkeyWords()
  {
    return KeyWordAddress::find()->all();
  }

  public function getBoss()
  {
    return KeyWordAddress::findOne(['name' => 'boss'])->id;
  }

  public function getEarth()
  {
    return KeyWordAddress::findOne(['name' => 'earth'])->id;
  }

  public function getIce()
  {
    return KeyWordAddress::findOne(['name' => 'ice'])->id;
  }

  public function getSbor()
  {
    return KeyWordAddress::findOne(['name' => 'sbor'])->id;
  }

}
