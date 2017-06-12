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

  public function updateTask($uptask, $id)
  {
      $task = Task::findOne(['id' => $id]);
      $task = $uptask;
      return $task->save();
  }

  public function createTask($crtask)
  {
      $task = new Task();
      $task = $crtask;
      return $task->save();
  }

  public function deleteTask($id)
  {
      $task = Task::findOne(['id' => $id]);
      return $task->delete();
  }

}
