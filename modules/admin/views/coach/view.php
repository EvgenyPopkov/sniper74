<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


$this->title = $model->lastName;
$this->params['breadcrumbs'][] = ['label' => 'Тренера', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coach-view">

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
        ],
    ]) ?>

</div>
