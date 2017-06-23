<?php

use yii\helpers\Html;

$this->title = 'Изменить: ' . $model->head;
$this->params['breadcrumbs'][] = ['label' => 'Сборы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->head, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="sbor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('formUpdate', [
        'model' => $model,
    ]) ?>

</div>
