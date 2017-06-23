<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->head;
$this->params['breadcrumbs'][] = ['label' => 'Сборы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sbor-view">

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
            'dateBegin',
            'dateEnd',
            'head',
            'description:ntext',
            'price',
            [
                'format' => 'html',
                'label' => 'Картинка',
                'value' => function($model){
                    return Html::img($model->getImage(), ['width'=>200]);
                }
            ],
            'priority',
        ],
    ]) ?>

</div>
