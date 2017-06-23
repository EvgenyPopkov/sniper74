<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Stock extends ActiveRecord
{
  public static function tableName()
  {
      return 'stock';
  }

  public function rules()
  {
      return [
          [['header', 'description'],'required'],
          [['priority'], 'integer'],
          [['date'], 'default', 'value' => date('Y-m-d')],
          [['header'], 'string', 'max' => 255],
      ];
  }

  public function attributeLabels()
  {
      return [
          'id' => 'ID',
          'header' => 'Название',
          'description' =>'Описание',
          'priority' => 'Приоритет',
          'date' => 'Дата',
      ];
  }

  public function getAll()
  {
      return Stock::find()->orderBy('priority desc, date desc')->all();
  }
}
