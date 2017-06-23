<?php

use yii\helpers\Html;

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Сборы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sbor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
