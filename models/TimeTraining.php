<?php

namespace app\models;

use Yii;

class TimeTraining extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'time_training';
    }

    public function rules()
    {
        return [
            [['idTraining', 'idAddress'], 'required'],
            [['idTraining', 'idAddress'], 'integer'],
            [['begin', 'end'], 'string', 'max' => 255],
            [['idAddress'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['idAddress' => 'id']],
            [['idTraining'], 'exist', 'skipOnError' => true, 'targetClass' => Training::className(), 'targetAttribute' => ['idTraining' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idTraining' => 'Тренировка',
            'idAddress' => 'Адрес',
            'begin' => 'Время начала',
            'end' => 'Время окончания',
        ];
    }

    public function getTime($id)
    {
        return TimeTraining::findOne(['id' => $id]);
    }

    public function getEntries()
    {
        return $this->hasMany(Entry::className(), ['idTimeTraining' => 'id']);
    }

    public function getAddress()
    {
        return $this->hasOne(Address::className(), ['id' => 'idAddress']);
    }

    public function getTraining()
    {
        return $this->hasOne(Training::className(), ['id' => 'idTraining']);
    }
}
