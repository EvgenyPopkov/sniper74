<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Coach extends ActiveRecord
{
  public static function tableName()
  {
      return 'coach';
  }

  public function rules()
  {
      return [
          [['firstName', 'lastName', 'place', 'description'],'required'],
          [['firstName', 'lastName', 'image', 'place','vk'], 'string', 'max' => 255],
          ['priority','integer']
      ];
  }

  public function attributeLabels()
  {
      return [
          'id' => 'ID',
          'firstName' => 'Имя',
          'lastName' => 'Фамилия',
          'place' => 'Должность',
          'description' => 'Описание',
          'vk' => 'Вконтакте',
          'image' => 'Изображение',
          'priority' => 'Приоритет',
      ];
  }


  public function getCoaches()
  {
      return Coach::find()->all();
  }

  public function getImage()
  {
     return '@web/images/coaches/' . $this->image;
  }

  public function saveImage($filename)
  {
     $this->image = $filename;
     return $this->save(false);
  }

  public function deleteImage()
  {
     $imageUploadModel = new ImageUpload();
     $imageUploadModel->dir='coaches';
     $imageUploadModel->deleteCurrentImage($this->image);
  }

  public function beforeDelete()
  {
     $this->deleteImage();
     return parent::beforeDelete();
  }

}
