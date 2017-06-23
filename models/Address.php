<?php

namespace app\models;

use Yii;

class Address extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'address';
    }

    public function rules()
    {
        return [
            [['idTag','address', 'width', 'height'], 'required'],
            [['idTag'], 'integer'],
            [['width', 'height'], 'number'],
            [['address', 'description'], 'string', 'max' => 255],
            [['idTag'], 'exist', 'skipOnError' => true, 'targetClass' => TagAddress::className(), 'targetAttribute' => ['idTag' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idTag' => 'Тэг',
            'address' => 'Адрес',
            'description' => 'Описание',
            'width' => 'Широта',
            'height' => 'Долгота',
        ];
    }

    public function getAddress()
    {
        return Address::find()->all();
    }

    public function getAddressName($id)
    {
        return Address::findOne(['id' => $id])->address;
    }

    public function getAddressTag($tag)
    {
        return Address::findAll(['idTag' => TagAddress::getTag($tag)]);
    }

    public function getCoordinates()
    {
        return Address::find()->select(['address','width', 'height'], 'DISTINCT')->all();;
    }

    public function getTag()
    {
        return $this->hasOne(TagAddress::className(), ['id' => 'idTag']);
    }

    public function getTimeTrainings()
    {
        return $this->hasMany(TimeTraining::className(), ['idAddress' => 'id']);
    }

    public function saveTag($tagId)
    {
        $tag = TagAddress::findOne($tagId);
        if($tag != null)
        {
            $this->link('tag', $tag);
            return true;
        }

        return false;
    }
}
