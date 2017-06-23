<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'О нас';
$this->params['breadcrumbs'][] = ['label' => 'О нас'];
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'we',
            'training',
            'footer',
            'gym',
        ],
    ]) ?>

</div>
