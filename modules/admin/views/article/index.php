<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= $this->title ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'idCategory',
            [
                'format' => 'text',
                'label' => 'Название категории',
                'value' => function($data){
                    return $data->category->name;
                }
            ],
            'title',
            'description:ntext',
            'content:html',
            'date',
            [
                'format' => 'html',
                'label' => 'Картинка',
                'value' => function($data){
                    return Html::img($data->getImage(), ['width'=>200]);
                }
            ],
            'viewed',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
