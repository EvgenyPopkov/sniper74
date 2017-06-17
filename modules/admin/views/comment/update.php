<?php

use yii\helpers\Html;

$this->title = 'Изменить: ';
$this->params['breadcrumbs'][] = ['label' => 'Комментарии', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="comment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
