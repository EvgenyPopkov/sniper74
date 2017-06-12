<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class TaskProgram extends ActiveRecord
{
  public static function tableName()
  {
      return 'task_program';
  }

  public function getAll()
  {
      return TaskProgram::find()->all();
  }

  public function getTask($id)
  {
      return TaskProgram::find()->select('idTask')->where(['idProgram' => $id])->all();
  }

  public function updateTaskProgram($uptaskprogram, $id)
  {
      $taskprogram = TaskProgram::findOne(['id' => $id]);
      $taskprogram = $uptaskprogram;
      return $taskprogram->save();
  }

  public function createTaskProgram($crtaskprogram)
  {
      $taskprogram = new TaskProgram();
      $taskprogram = $crtaskprogram;
      return $taskprogram->save();
  }

  public function deleteTaskProgram($id)
  {
      $taskprogram = TaskProgram::findOne(['id' => $id]);
      return $taskprogram->delete();
  }

}
