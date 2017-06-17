<?php

use yii\helpers\Html;

$this->title = 'Изменить';
$this->params['breadcrumbs'][] = ['label' => 'Главная странциа', 'url' => ['view']];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="article-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
