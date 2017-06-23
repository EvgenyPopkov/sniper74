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

    public function getRepeat($taskId, $programId)
    {
      return TaskProgram::findOne(['idProgram' => $programId, 'idTask' => $taskId]);
    }

    public function getProgram()
    {
        return $this->hasOne(Program::className(), ['id' => 'idProgram']);
    }

    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'idTask']);
    }

    public function saveProgramTask($programId, $taskId)
    {
        $program = Program::findOne($programId);
        $task = Task::findOne($taskId);
        if($program != null && $task != null)
        {
            $this->link('program', $program);
            $this->link('task', $task);
            return true;
        }

        return false;
    }
}
