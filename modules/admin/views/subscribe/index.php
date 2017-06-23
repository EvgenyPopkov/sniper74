<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Подписчики';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscribe-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'email:email',
            'date',
            [
                'format' => 'html',
                'label' => 'Статус',
                'value' => function($data){
                    if($data->isAllowed()):
                        return Html::a('Отписать', ['disallow', 'id' => $data->id], ['class' => 'btn btn-warning']);
                    else:
                        return Html::a('Подписать', ['allow', 'id' => $data->id], ['class' => 'btn btn-success']);
                    endif;
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
