<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Программы-Упражнения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-program-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'idProgram',
            [
                'format' => 'html',
                'label' => 'Название программы',
                'value' => function($data){
                    return $data->program->name;
                }
            ],
            'idTask',
            [
                'format' => 'html',
                'label' => 'Название упражнения',
                'value' => function($data){
                    return $data->task->name;
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
