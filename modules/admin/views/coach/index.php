<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Тренера';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coach-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'firstName',
            'lastName',
            'place',
            'description:ntext',
            'vk',
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
