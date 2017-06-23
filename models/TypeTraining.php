<?php

namespace app\models;

use Yii;

class TypeTraining extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'type_training';
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
            'name' => 'Назание',
        ];
    }

    public function getType($type)
    {
        return TypeTraining::findOne(['name' => $type]);
    }
}
