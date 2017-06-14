<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Program extends ActiveRecord
{
  public static function tableName()
  {
      return 'program';
  }

  public function getInfo()
  {
      $listprogram = Program::find()->all();

      foreach ($listprogram as $program) {
        $arrId = TaskProgram::getTask($program->id);

        $arr = null;
        $i = 0;
        foreach ($arrId as $id) {
          $arr[$i] = [
            'task' => Task::getTaskForIndex($id->idTask),
          ];
          $i++;
        }

        $result[]= [
          'name' => $program->name,
          'description' => $program->description,
          'image' => $program->image,
          'task' => $arr,
        ];
      }

      return $result;
  }

  public function getPrograms()
  {
      return Program::find()->all();
  }

}
