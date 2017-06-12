<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class TimeTraining extends ActiveRecord
{
  public static function tableName()
  {
      return 'time_training';
  }

  public function getTime($id)
  {
      return TimeTraining::findAll(['idTraining' => $id]);
  }

}
