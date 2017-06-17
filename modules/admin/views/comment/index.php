<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Комментарии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idArticle',
            [
                'format' => 'html',
                'label' => 'Название статьи',
                'value' => function($data){
                    return $data->article->title;
                }
            ],
            'idUser',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
