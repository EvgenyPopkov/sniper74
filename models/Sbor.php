<?php

namespace app\models;

use Yii;

class Sbor extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'sbor';
    }

    public function rules()
    {
        return [
            [['dateBegin', 'dateEnd', 'head', 'description', 'price'],'required'],
            [['dateBegin', 'dateEnd'], 'safe'],
            [['description'], 'string'],
            ['priority', 'integer'],
            [['head', 'price', 'image'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dateBegin' => 'Дата начала',
            'dateEnd' => 'Дата окончания',
            'head' => 'Название',
            'description' => 'Описание',
            'price' => 'Цена',
            'image' => 'Изображение',
            'priority' => 'Приоритет',
        ];
    }

    public function getCount()
    {
        return Sbor::find()->count() > 0 ? true : false;
    }

    public function getAll()
    {
        return Sbor::find()->orderBy('priority desc')->all();
    }

    public function getSbor($id)
    {
        return Sbor::findOne(['id' => $id]);
    }

    public function getImage()
    {
       return '@web/images/sbor/' . $this->image;
    }

    public function saveImage($filename)
    {
       $this->image = $filename;
       return $this->save(false);
    }

    public function deleteImage()
    {
       $imageUploadModel = new ImageUpload();
       $imageUploadModel->dir='sbor';
       $imageUploadModel->deleteCurrentImage($this->image);
    }

    public function beforeDelete()
    {
       $this->deleteImage();
       return parent::beforeDelete();
    }
}
