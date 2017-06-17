<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

class Video extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'video';
    }

    public function rules()
    {
        return [
            [['proirity'], 'integer'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Видео',
            'proirity' => 'Приоритет',
            'date' => 'Дата',
        ];
    }

    public function getAll()
    {
        $query = Video::find()->orderBy('priority desc, date desc');
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>9]);
        $videos = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['videos'] = $videos;
        $data['pagination'] = $pagination;

        return $data;
    }
}
