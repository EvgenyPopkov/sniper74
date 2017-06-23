<?php

use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'Тренировки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'idType',
            [
                'format' => 'text',
                'label' => 'Название типа',
                'value' => function($data){
                    return $data->type->name;
                }
            ],
            'description',
            'day',
            'price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
