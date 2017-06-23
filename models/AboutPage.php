<?php

namespace app\models;

use Yii;
use yii\base\Model;

class AboutPage extends Model
{
  public $we;
  public $training;
  public $footer;
  public $gym;

  public function rules()
  {
      return [
          [['gym', 'footer', 'we', 'training'], 'required', 'message' => 'Обязательное поле'],
      ];
  }

  public function attributeLabels()
  {
      return [
          'gym' => 'Тренажеры',
          'footer' => 'Текст под упражнениями',
          'we' => 'Информация о центре',
          'training' => 'Краткая информация о тренировках',
      ];
  }

  public function getJson()
  {
        return json_decode(file_get_contents("../web/information/about.json"), true);
  }

  public function getAboutPage()
  {
      if ($model = $this->getJson()) {
          $this->we = $model['we'];
          $this->training = $model['training'];
          $this->footer = $model['footer'];
          $this->gym = $model['gym'];
          return true;
      }
      return false;
  }

  public function savePage()
  {
      $file = file_get_contents("../web/information/about.json");
      $taskList = json_decode($file, TRUE);
      $taskList =  array('we' => $this->we, 'training' => $this->training,
      'gym' => $this->gym, 'footer' => $this->footer);
      return file_put_contents("../web/information/about.json", json_encode($taskList));
  }
}
