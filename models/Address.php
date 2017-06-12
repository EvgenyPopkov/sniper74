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

  public function getAddressName($id)
  {
      return Address::findOne(['id' => $id])->address;
  }

  public function getAddressBoss()
  {
    return Address::findAll(['idKeyWord' => KeyWordAddress::getBoss()]);
  }

  public function getAddressEarth()
  {
    return Address::findAll(['idKeyWord' => KeyWordAddress::getEarth()]);
  }

  public function getAddressIce()
  {
    return Address::findAll(['idKeyWord' => KeyWordAddress::getIce()]);
  }

  public function getAddressSbor()
  {
    return Address::findAll(['idKeyWord' => KeyWordAddress::getSbor()]);
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
