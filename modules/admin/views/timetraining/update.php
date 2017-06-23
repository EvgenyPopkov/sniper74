<?php

use yii\helpers\Html;

$this->title = 'Изменить';
$this->params['breadcrumbs'][] = ['label' => 'Время тренировок', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="time-training-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('formUpdate', [
        'model' => $model,
        'trainings'=>$trainings,
        'trainingId' => $trainingId,
        'addresses'=>$addresses,
        'addressId' => $addressId
    ]) ?>

</div>
