<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Task extends ActiveRecord
{
  public static function tableName()
  {
      return 'task';
  }

  public function getTask()
  {
      return Task::find()->all();
  }

  public function getTaskForIndex($id)
  {
      $task = Task::findOne(['id' => $id]);
      return $task->name;
  }

}
