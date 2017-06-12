<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class IndexPage extends ActiveRecord
{
  public static function tableName()
  {
      return 'index_page';
  }

  public function getIndexPage()
  {
      return IndexPage::findOne(['id' => 1]);
  }
}
