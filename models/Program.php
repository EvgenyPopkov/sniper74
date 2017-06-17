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
}
