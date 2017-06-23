<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Записанные на сборы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entry-sbor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'idSbor',
            [
                'format' => 'text',
                'label' => 'Сборы',
                'value' => function($data){
                    return $data->sbor->head;
                }
            ],
            [
                'format' => 'text',
                'label' => 'Пользователь',
                'value' => function($data){
                    return $data->user->email.=' ('.$data->user->firstName.', '.$data->user->phone.')';
                }
            ],
        ],
    ]); ?>
</div>
