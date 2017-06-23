<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = ['label' => 'Контакты'];
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'address',
            'phone',
            'name',
            'email',
            'vk',
            'instagram',
            'youtube',
        ],
    ]) ?>

</div>
