<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Trainer extends ActiveRecord
{
  public static function tableName()
  {
      return 'trainer';
  }

  public function getAll()
  {
      return Trainer::find()->orderBy('priority DESC, date DESC')->all();
  }
}
