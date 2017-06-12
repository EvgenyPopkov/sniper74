<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class AboutPage extends ActiveRecord
{
  public static function tableName()
  {
      return 'about_page';
  }

  public function getAboutPage()
  {
      return AboutPage::findOne(['id' => 1]);
  }
}
