<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->params['breadcrumbs'][] = ['label' => 'Время тренировок', 'url' => ['index']];
?>
<div class="time-training-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'format' => 'text',
                'label' => 'Название тренировки',
                'value' => function($data){
                    return $data->training->description;
                }
            ],
            [
                'format' => 'text',
                'label' => 'Название адреса',
                'value' => function($data){
                    return $data->address->address;
                }
            ],
            'begin',
            'end',
        ],
    ]) ?>

</div>
