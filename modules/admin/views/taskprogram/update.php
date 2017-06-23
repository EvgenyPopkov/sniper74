<?php

use yii\helpers\Html;

$this->title = 'Изменить';
$this->params['breadcrumbs'][] = ['label' => 'Программы-Упражнения', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="task-program-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('formUpdate', [
        'model' => $model,
        'programs'=>$programs,
        'programId' => $programId,
        'tasks'=>$tasks,
        'taskId' => $taskId
    ]) ?>

</div>
