<?php

namespace app\models;

use Yii;

class Training extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'training';
    }

    public function rules()
    {
        return [
            [['idType', 'description','price','day'], 'required'],
            [['idType', 'day', 'price'], 'integer'],
            [['description'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idType' => 'Тип',
            'description' => 'Описание',
            'day' => 'День недели',
            'price' => 'Цена',
        ];
    }

    public function getTimes()
    {
        return $this->hasMany(TimeTraining::className(), ['idTraining' => 'id']);
    }

    public function getType()
    {
        return $this->hasOne(TypeTraining::className(), ['id' => 'idType']);
    }

    public function getTraining($type)
    {
      return Training::findAll(['idType' => TypeTraining::getType($type)]);
    }

    public function saveType($typeId)
    {
        $type = TypeTraining::findOne($typeId);
        if($type != null)
        {
            $this->link('type', $type);
            return true;
        }

        return false;
    }
}
