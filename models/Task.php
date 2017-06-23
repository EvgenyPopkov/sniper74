<?php

namespace app\models;

use Yii;

class Task extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'task';
    }

    public function rules()
    {
        return [
            ['name', 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
        ];
    }

    public function getTaskPrograms()
    {
        return $this->hasMany(TaskProgram::className(), ['idTask' => 'id']);
    }

    public function getPrograms()
    {
        return $this->hasMany(Program::className(), ['id' => 'idProgram'])->viaTable('task_program', ['idTask' => 'id']);
    }
}
