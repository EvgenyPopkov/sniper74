<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Address extends ActiveRecord
{
  public static function tableName()
  {
      return 'address';
  }

  public function getAddress()
  {
      return Address::find()->all();
  }

  public function getAddressBoss()
  {
    return Address::findOne(['id' => '1']);
  }

  public function getCoordinates()
  {
    return Address::find()->select(['address','width', 'height'], 'DISTINCT')->all();;
  }

  public function updateAddress($upaddress, $id)
  {
      $address = Address::findOne(['id' => $id]);
      $address = $upaddress;
      return $address->save();
  }

  public function createAddress($craddress)
  {
      $address = new Address();
      $address = $craddress;
      return $address->save();
  }

  public function deleteAddress($id)
  {
      $address = Address::findOne(['id' => $id]);
      return $address->delete();
  }

}
