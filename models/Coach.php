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

}
