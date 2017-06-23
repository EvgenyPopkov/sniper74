<?php

use yii\helpers\Html;

$this->title = 'Изменить';
$this->params['breadcrumbs'][] = ['label' => 'Фотографии', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="photo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('formUpdate', [
        'model' => $model,
    ]) ?>

</div>
