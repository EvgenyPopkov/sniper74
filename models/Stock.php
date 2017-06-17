<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Stock extends ActiveRecord
{
  public static function tableName()
  {
      return 'stock';
  }

  public function getAll()
  {
      return Stock::find()->orderBy('priority desc, date desc')->all();
  }
}
