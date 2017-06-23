<?php

use yii\helpers\Html;

$this->title = 'Изменить';
$this->params['breadcrumbs'][] = ['label' => 'Видеозаписи', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="video-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
