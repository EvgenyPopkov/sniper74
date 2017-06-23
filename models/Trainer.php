<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Trainer extends ActiveRecord
{
  public static function tableName()
  {
      return 'trainer';
  }

  public function rules()
  {
      return [
          [['name', 'description'],'required'],
          ['priority', 'integer'],
          [['date'], 'default', 'value' => date('Y-m-d')],
          ['name', 'string', 'max' => 255],
      ];
  }

  public function attributeLabels()
  {
      return [
          'id' => 'ID',
          'name' => 'Название',
          'description' => 'Описание',
          'image' => 'Изображение',
          'priority' => 'Приоритет',
          'date' => 'Дата',
      ];
  }

  public function getAll()
  {
      return Trainer::find()->orderBy('priority DESC, date DESC')->all();
  }

  public function getImage()
  {
     return '@web/images/trainer/' . $this->image;
  }

  public function saveImage($filename)
  {
     $this->image = $filename;
     return $this->save(false);
  }

  public function deleteImage()
  {
     $imageUploadModel = new ImageUpload();
     $imageUploadModel->dir='trainer';
     $imageUploadModel->deleteCurrentImage($this->image);
  }

  public function beforeDelete()
  {
     $this->deleteImage();
     return parent::beforeDelete();
  }
}
