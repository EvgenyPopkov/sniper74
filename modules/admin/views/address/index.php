<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Адреса';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idTag',
            [
                'format' => 'text',
                'label' => 'Название тэга',
                'value' => function($data){
                    return $data->tag->name;
                }
            ],
            'address',
            'description',
            'width',
            'height',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
