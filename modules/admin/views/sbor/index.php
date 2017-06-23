<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Сборы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sbor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'dateBegin',
            'dateEnd',
            'head',
            'description:ntext',
            'price',
            [
                'format' => 'html',
                'label' => 'Картинка',
                'value' => function($data){
                    return Html::img($data->getImage(), ['width'=>200]);
                }
            ],
            'priority',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
