<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Главная страница';
$this->params['breadcrumbs'][] = ['label' => 'Главная страница', 'url' => ['index']];
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
            [
                'format' => 'html',
                'label' => 'Картинка бросок',
                'value' => function($data){
                    return Html::img($data->getImageShot(), ['width'=>200]);
                }
            ],
            [
                'format' => 'html',
                'label' => 'Картинка катание',
                'value' => function($data){
                    return Html::img($data->getImageScating(), ['width'=>200]);
                }
            ],
            [
                'format' => 'html',
                'label' => 'Картинка дриблинг',
                'value' => function($data){
                    return Html::img($data->getImageDribbling(), ['width'=>200]);
                }
            ],
        ],
    ]) ?>

</div>
