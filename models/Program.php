<?php

namespace app\models;

use Yii;

class Program extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'program';
    }

    public function rules()
    {
        return [
            [['name','description'],'required'],
            [['description'], 'string'],
            [['name', 'image'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание',
            'image' => 'Изображение',
        ];
    }

    public function getAll()
    {
        return Program::find()->all();
    }

    public function getTaskPrograms()
    {
        return $this->hasMany(TaskProgram::className(), ['idProgram' => 'id']);
    }

    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['id' => 'idTask'])->viaTable('task_program', ['idProgram' => 'id']);
    }

    public function saveImage($filename)
    {
       $this->image = $filename;
       return $this->save(false);
    }

    public function getImage()
    {
       return ($this->image) ? '@web/images/training/' . $this->image : 'no-image.png';
    }

    public function deleteImage()
    {
       $imageUploadModel = new ImageUpload();
       $imageUploadModel->dir='training';
       $imageUploadModel->deleteCurrentImage($this->image);
    }

    public function beforeDelete()
    {
       $this->deleteImage();
       return parent::beforeDelete();
    }
}
