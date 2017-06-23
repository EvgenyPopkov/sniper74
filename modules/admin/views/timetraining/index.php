<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Время тренировок';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="time-training-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idTraining',
            [
                'format' => 'text',
                'label' => 'Название тренировки',
                'value' => function($data){
                    return $data->training->description.='('.$data->training->day.')';
                }
            ],
            'idAddress',
            [
                'format' => 'text',
                'label' => 'Название адреса',
                'value' => function($data){
                    return $data->address->address;
                }
            ],
            'begin',
            'end',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
