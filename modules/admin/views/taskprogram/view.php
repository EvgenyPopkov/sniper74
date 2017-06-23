<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->params['breadcrumbs'][] = ['label' => 'Программы-Упражнения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-program-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'idTask' => $model->idTask, 'idProgram' => $model->idProgram], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'idTask' => $model->idTask, 'idProgram' => $model->idProgram], [
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
                'label' => 'Программа',
                'value' => $model->program->name
            ],
            [
                'format' => 'text',
                'label' => 'Упражнение',
                'value' => $model->task->name
            ],

        ],
    ]) ?>

</div>
