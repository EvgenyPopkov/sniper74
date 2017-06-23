<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

class Photo extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'photo';
    }

    public function rules()
    {
        return [
            [['priority'], 'integer'],
            [['date'], 'default', 'value' => date('Y-m-d')],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Изображение',
            'priority' => 'Приоритет',
            'date' => 'Дата',
        ];
    }

    public function getAll()
    {
        $query = Photo::find()->orderBy('priority desc, date desc');
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>9]);
        $photos = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['photos'] = $photos;
        $data['pagination'] = $pagination;

        return $data;
    }

    public function getForAbout()
    {
        return Photo::find()->orderBy('priority desc, date desc')->limit(5)->all();
    }

    public function getImage()
    {
       return '@web/images/photo/' . $this->name;
    }

    public function saveImage($filename)
    {
       $this->name = $filename;
       return $this->save(false);
    }

    public function deleteImage()
    {
       $imageUploadModel = new ImageUpload();
       $imageUploadModel->dir='photo';
       $imageUploadModel->deleteCurrentImage($this->name);
    }

    public function beforeDelete()
    {
       $this->deleteImage();
       return parent::beforeDelete();
    }

}
