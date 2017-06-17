<?php

namespace app\models;

use Yii;

class TaskProgram extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'task_program';
    }

    public function rules()
    {
        return [
            [['idTask', 'idProgram'], 'required'],
            [['idTask', 'idProgram'], 'integer'],
            [['idProgram'], 'exist', 'skipOnError' => true, 'targetClass' => Program::className(), 'targetAttribute' => ['idProgram' => 'id']],
            [['idTask'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['idTask' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'idTask' => 'Упражнение',
            'idProgram' => 'Программа',
        ];
    }

    public function getProgram()
    {
        return $this->hasOne(Program::className(), ['id' => 'idProgram']);
    }

    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'idTask']);
    }
}
