<?php

use yii\helpers\Html;

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Видеозаписи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
