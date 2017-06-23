<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

class Comment extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'comment';
    }

    public function rules()
    {
        return [
            [['idArticle', 'idUser'], 'required'],
            [['idArticle', 'idUser', 'status'], 'integer'],
            [['text'], 'string'],
            [['date'], 'safe'],
            [['idArticle'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['idArticle' => 'id']],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idArticle' => 'Cтатья',
            'idUser' => 'Пользователь',
            'text' => 'Текст',
            'date' => 'Дата',
            'status' => 'Статус',
        ];
    }

    public function getArticle()
    {
        return $this->hasOne(Article::className(), ['id' => 'idArticle']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }

    public function getDate()
    {
        return Yii::$app->formatter->asDate($this->date);
    }

    public function isAllowed()
    {
        return $this->status;
    }
    public function allow()
    {
        $this->status = 1;
        return $this->save(false);
    }
    public function disallow()
    {
        $this->status = 0;
        return $this->save(false);
    }
}
