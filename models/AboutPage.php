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

  public function getAboutPage()
  {
        return json_decode(file_get_contents("../web/information/about.json"), true);
  }
}
