<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->params['breadcrumbs'][] = ['label' => 'Комментарии', 'url' => ['index']];
?>
<div class="comment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хоите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'format' => 'html',
                'label' => 'Название статьи',
                'value' => function($data){
                    return $data->article->title;
                }
            ],
            [
                'format' => 'html',
                'label' => 'Email',
                'value' => function($data){
                    return $data->user->email;
                }
            ],
            'text:ntext',
            'date',
            'status',
        ],
    ]) ?>

</div>
