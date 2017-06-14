<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Training extends ActiveRecord
{
  public static function tableName()
  {
      return 'training';
  }

  public function getEarth()
  {
      $listtraining = Training::findAll(['idType' => TypeTraining::getIdEarth()]);

      foreach ($listtraining as $training){
          $times = TimeTraining::getTime($training->id);
          $arr = null;
          $i = 0;
          foreach ($times as $time) {
            $arr[$i] = [
              'begin' => $time->begin,
              'end' => $time->end,
              'address' => Address::getAddressName($time->idAddress),
            ];
            $i++;
          }
          $result[]= [
            'description' => $training->description,
            'day' => $training->day,
            'price' => $training->price,
            'time' => $arr,
          ];
      }

      return $result;
  }

  public function getIce()
  {
      $listtraining = Training::findAll(['idType' => TypeTraining::getIdIce()]);

      foreach ($listtraining as $training){
          $times = TimeTraining::getTime($training->id);
          $arr = null;
          $i = 0;
          foreach ($times as $time) {
            $arr[$i] = [
              'begin' => $time->begin,
              'end' => $time->end,
              'address' => Address::getAddressName($time->idAddress),
            ];
            $i++;
          }
          $result[]= [
            'description' => $training->description,
            'day' => $training->day,
            'price' => $training->price,
            'time' => $arr,
          ];
      }

      return $result;
  }

}
