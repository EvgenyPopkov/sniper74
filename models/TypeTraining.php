<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class TypeTraining extends ActiveRecord
{
  public static function tableName()
  {
      return 'type_training';
  }

  public function getIdEarth()
  {
      return TypeTraining::findOne(['name' => 'earth']);
  }

  public function getIdIce()
  {
      return TypeTraining::findOne(['name' => 'ice']);
  }

}
