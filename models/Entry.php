<?php

namespace app\models;

use Yii;

class Entry extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'entry';
    }

    public function rules()
    {
        return [
            [['idTime', 'idUser','date'], 'required'],
            [['idTime', 'idUser'], 'integer'],
            [['date'], 'safe'],
            ['date', 'smallDate'],
            ['date', 'bigDate'],
            ['date', 'weekDate'],
            [['idTime'], 'exist', 'skipOnError' => true, 'targetClass' => TimeTraining::className(), 'targetAttribute' => ['idTime' => 'id']],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idTime' => 'Время тренировки',
            'idUser' => 'Пользователь',
            'date' => 'Дата'
        ];
    }

    public function smallDate($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if (strtotime($this->date) <= strtotime(date('Y-m-d'))) {
                $this->addError($attribute, 'Дата должна быть позже текущей даты');
            }
        }
    }

    public function weekDate($attribute, $params)
    {
        if (!$this->hasErrors()) {
          if ($this->time->training->day != $this->getWeek()) {
              $this->addError($attribute, 'Неправильный день недели. Выберите '.$this->getDateName($this->time->training->day));
          }
        }
    }

    public function getDateName($value){
      switch ($value) {
          case 1:
              return "Понедельник";
              break;
          case 2:
              return "Вторник";
              break;
          case 3:
              return "Среда";
              break;
          case 4:
              return "Четверг";
              break;
          case 5:
              return "Пятница";
              break;
          case 6:
              return "Суббота";
              break;
          case 7:
              return "Воскресенье";
              break;
      }
    }

    public function getWeek()
    {
      $day;
      switch (strftime("%a", strtotime($this->date))) {
        case 'Mon':
          $day = 1;
          break;
        case 'Tue':
          $day = 2;
          break;
        case 'Wed':
          $day = 3;
          break;
        case 'Thu':
          $day = 4;
          break;
        case 'Fri':
          $day = 5;
          break;
        case 'Sat':
          $day = 6;
          break;
        case 'Sun':
          $day = 7;
          break;
      }

      return $day;
    }

    public function bigDate($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if (strtotime($this->date) >= strtotime(date('Y-m-d', strtotime("+30 days")))) {
                $this->addError($attribute, 'Дата должна быть не позже 30 дней от текущей даты');
            }
        }
    }

    public function getEntry($id)
    {
        return Entry::findOne(['id' => $id]);
    }

    public function getTime()
    {
        return $this->hasOne(TimeTraining::className(), ['id' => 'idTime']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }

    public function EqualsModel()
    {
        $entrys = Entry::find()->all();

        foreach ($entrys as $entry) {
          if ($entry->idUser == $this->idUser && $entry->idTime == $this->idTime && $entry->date == $this->date)
          return false;
        }

        return true;
    }

    public function SendMailEntry()
    {
      return Yii::$app->mailer->compose('entry', ['entry' => $this])
        ->setFrom([Yii::$app->params['adminEmail'] => 'Хоккейный центр Sniper'])
        ->setTo(Yii::$app->params['adminEmail'])
        ->setSubject('Запись на тренировку')
        ->send();
    }

    public function SendMailCancel()
    {
      return Yii::$app->mailer->compose('cancel', ['entry' => $this])
        ->setFrom([Yii::$app->params['adminEmail'] => 'Хоккейный центр Sniper'])
        ->setTo(Yii::$app->params['adminEmail'])
        ->setSubject('Отмена записи')
        ->send();
    }

    public function delOld()
    {
        $entrys = Entry::find()->where('date < :date')->addParams([':date' => date("Y-m-d")])->all();
        foreach ($entrys as $enttry) {
          $enttry->delete();
        }
    }

}
