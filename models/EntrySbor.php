<?php

namespace app\models;

use Yii;

class EntrySbor extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'entry_sbor';
    }

    public function rules()
    {
        return [
            [['idSbor', 'idUser'], 'required'],
            [['idSbor', 'idUser'], 'integer'],
            [['idSbor'], 'exist', 'skipOnError' => true, 'targetClass' => Sbor::className(), 'targetAttribute' => ['idSbor' => 'id']],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idSbor' => 'Сборы',
            'idUser' => 'Пользователь',
        ];
    }

    public function getSbor()
    {
        return $this->hasOne(Sbor::className(), ['id' => 'idSbor']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }

    public function getEntry($id)
    {
        return EntrySbor::findOne(['id' => $id]);
    }

    public function EqualsModel()
    {
        $entrys = EntrySbor::find()->all();

        foreach ($entrys as $entry) {
          if ($entry->idUser == $this->idUser && $entry->idSbor == $this->idSbor)
          return false;
        }

        return true;
    }

    public function SendMailEntry()
    {
      return Yii::$app->mailer->compose('entrysbor', ['entry' => $this])
        ->setFrom([Yii::$app->params['adminEmail'] => 'Хоккейный центр Sniper'])
        ->setTo(Yii::$app->params['adminEmail'])
        ->setSubject('Запись на сборы')
        ->send();
    }

    public function SendMailCancel()
    {
      return Yii::$app->mailer->compose('cancelsbor', ['entry' => $this])
        ->setFrom([Yii::$app->params['adminEmail'] => 'Хоккейный центр Sniper'])
        ->setTo(Yii::$app->params['adminEmail'])
        ->setSubject('Отмена записи на сборы')
        ->send();
    }
}
