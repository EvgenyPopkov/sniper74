<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Coach extends ActiveRecord
{
  public static function tableName()
  {
      return 'coach';
  }

  public function getCoaches()
  {
      return Coach::find()->all();
  }

  public function updateCoach($upcoach, $id)
  {
      $coach = Address::findOne(['id' => $id]);
      $coach = $upcoach;
      return $coach->save();
  }

  public function createAddress($crcoach)
  {
      $coach = new Address();
      $coach = $crcoach;
      return $coach->save();
  }

  public function deleteAddress($id)
  {
      $coach = Address::findOne(['id' => $id]);
      return $coach->delete();
  }

}
