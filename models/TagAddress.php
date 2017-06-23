<?php

namespace app\models;

use Yii;

class TagAddress extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'tag_address';
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

    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['idTag' => 'id']);
    }

    public function getAll()
    {
        return TagAddress::find()->all();
    }

    public function getTag($tag)
    {
        return TagAddress::findOne(['name' => $tag])->id;
    }
}
