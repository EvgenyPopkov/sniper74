<?php

use yii\helpers\Html;


$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Программы-Упражнения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-program-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'programs'=>$programs,
        'tasks'=>$tasks,
    ]) ?>

</div>
