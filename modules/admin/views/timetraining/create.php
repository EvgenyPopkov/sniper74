<?php

use yii\helpers\Html;

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Время тренировок', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="time-training-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'trainings' => $trainings,
        'addresses' => $addresses
    ]) ?>

</div>
