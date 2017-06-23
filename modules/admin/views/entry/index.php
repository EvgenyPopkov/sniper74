<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Записанные на тренировки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entry-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
      <?= Html::a('Удалить старые записи', ['deleteold'], [
          'class' => 'btn btn-danger',
          'data' => [
              'confirm' => 'Вы действительно хотите удалить старые записи?',
              'method' => 'post',
          ],
      ]) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'format' => 'text',
                'label' => 'Тренировка',
                'value' => function($data){
                    return $data->time->training->description;
                }
            ],
            'date',
            [
                'format' => 'text',
                'label' => 'Время',
                'value' => function($data){
                    return $data->time->begin.=' - '.$data->time->end;
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
