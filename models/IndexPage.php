<?php

namespace app\models;

use Yii;
use yii\base\Model;

class IndexPage extends Model
{
  public $we;
  public $imageDribbling;
  public $imageScating;
  public $imageShot;

  public function rules()
  {
      return [
          [['imageShot', 'imageScating', 'we', 'imageDribbling'], 'required', 'message' => 'Обязательное поле'],
      ];
  }

  public function attributeLabels()
  {
      return [
          'we' => 'Немного о нас',
          'imageShot' => 'Картинка бросок',
          'imageScating' => 'Картинка катание',
          'imageDribbling' => 'Картинка дриблинг',
      ];
  }

  public function saveImageShot($filename)
  {
      $this->deleteImage($this->imageShot);
      $file = file_get_contents("../web/information/index.json");
      $taskList = json_decode($file, TRUE);
      $taskList["imageShot"]  = $filename;

      return file_put_contents("../web/information/index.json", json_encode($taskList));
  }

  public function saveImageDribbling($filename)
  {
      $this->deleteImage($this->imageDribbling);
      $file = file_get_contents("../web/information/index.json");
      $taskList = json_decode($file, TRUE);
      $taskList["imageDribbling"]  = $filename;

      return file_put_contents("../web/information/index.json", json_encode($taskList));
  }

  public function saveImageScating($filename)
  {
      $this->deleteImage($this->imageScating);
      $file = file_get_contents("../web/information/index.json");
      $taskList = json_decode($file, TRUE);
      $taskList["imageScating"]  = $filename;

      return file_put_contents("../web/information/index.json", json_encode($taskList));
  }

  public function deleteImage($image)
  {
     $imageUploadModel = new ImageUpload();
     $imageUploadModel->dir = 'index';
     $imageUploadModel->deleteCurrentImage($image);
  }

  public function getImageScating()
  {
     return ($this->imageScating) ? '@web/images/index/' . $this->imageScating : 'no-image.png';
  }

  public function getImageDribbling()
  {
     return ($this->imageDribbling) ? '@web/images/index/' . $this->imageDribbling : 'no-image.png';
  }

  public function getImageShot()
  {
     return ($this->imageShot) ? '@web/images/index/' . $this->imageShot : 'no-image.png';
  }

  public function getIndexPage()
  {
      if ($model = $this->getJson()) {
          $this->we = $model['we'];
          $this->imageShot = $model['imageShot'];
          $this->imageScating = $model['imageScating'];
          $this->imageDribbling = $model['imageDribbling'];
          return true;
      }
      return false;
  }

  public function getJson()
  {
      return json_decode(file_get_contents("../web/information/index.json"), true);
  }

  public function savePage()
  {
      $file = file_get_contents("../web/information/index.json");
      $taskList = json_decode($file, TRUE);
      $taskList =  array('we' => $this->we, 'imageShot' => $this->imageShot,
      'imageScating' => $this->imageScating, 'imageDribbling' => $this->imageDribbling);
      return file_put_contents("../web/information/index.json", json_encode($taskList));
  }

}
