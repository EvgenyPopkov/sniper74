<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

class News extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'news';
    }

    public function rules()
    {
        return [
            [['name', 'content'],'required'],
            [['content'], 'string'],
            [['priority'], 'integer'],
            [['date'], 'default', 'value' => date('Y-m-d')],
            [['name', 'image'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'content' => 'Текст',
            'image' => 'Изображение',
            'priority' => 'Приоритет',
            'date' => 'Дата',
        ];
    }

    public function getForIndex()
    {
        return News::find()->orderBy('priority desc')->limit(3)->all();
    }

    public function getAll($pageSize)
    {
        $query = News::find()->orderBy('priority desc, date desc');
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
        $news = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['news'] = $news;
        $data['pagination'] = $pagination;

        return $data;
    }

    public function getImage()
    {
       return '@web/images/news/' . $this->image;
    }

    public function saveImage($filename)
    {
       $this->image = $filename;
       return $this->save(false);
    }

    public function deleteImage()
    {
       $imageUploadModel = new ImageUpload();
       $imageUploadModel->dir='news';
       $imageUploadModel->deleteCurrentImage($this->image);
    }

    public function beforeDelete()
    {
       $this->deleteImage();
       return parent::beforeDelete();
    }

    public function isAllowed()
    {
        return $this->status;
    }

    public function disallow()
    {
        $this->status = 0;
        return $this->save(false);
    }

    public function publish()
    {
        $users = Subscribe::findAll(['status' => 1]);
        foreach ($users as $user) {
            if($this->image!==null && $this->image!==''){
              Yii::$app->mailer->compose('news', ['news' => $this, 'email' => $user->email,'image' => Yii::getAlias('@web').'images/news/'.$this->image])
              ->setFrom([Yii::$app->params['adminEmail'] => 'Хоккейный центр Sniper'])
              ->setTo($user->email)
              ->setSubject($this->name)
              ->send();
            }
            else{
              Yii::$app->mailer->compose('news', ['news' => $this, 'email' => $user->email])
              ->setFrom([Yii::$app->params['adminEmail'] => 'Хоккейный центр Sniper'])
              ->setTo($user->email)
              ->setSubject($this->name)
              ->send();
            }
      }
    }
}
