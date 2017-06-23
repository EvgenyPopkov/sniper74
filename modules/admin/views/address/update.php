<?php

use yii\helpers\Html;

$this->title = 'Изменить: ' . $model->address;
$this->params['breadcrumbs'][] = ['label' => 'Адреса', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->address, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="address-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('formUpdate', [
        'model' => $model,
        'tags'=>$tags,
        'tagId' => $tagId
    ]) ?>

</div>
