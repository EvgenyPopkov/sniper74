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
            ['name', 'required'],
            [['priority'], 'integer'],
            [['date'], 'default', 'value' => date('Y-m-d')],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Сслыка на видео',
            'priority' => 'Приоритет',
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
