<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Статьи - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/recent.css', ['depends' => ['app\assets\AppAsset']]);
?>

<div class="site-recent">
  <div class="recent-block">
    <h1>Последние опубликованные статьи</h1>
    <hr>
  </div>
  <?php foreach($recent as $rec){?>
    <div class="recent">
      <img class='lazy' data-original="/images/articles/<?= Html::encode($rec->image) ?>" alt="<?= Html::encode($rec->title) ?>">
      <h3><?= Html::encode($rec->category->name)?></h3>
      <h2><?= Html::encode($rec->title)?></h2>
      <hr class="hr-black">
      <p> <?= Html::encode($rec->description)?></p>
      <div class="more">
        <a href="<?= Url::toRoute(['site/blog', 'id'=> $rec->id]);?>">Подробнее</a>
      </div>
      <div class="row stat">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          <?= Html::encode($rec->date)?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          <i class="fa fa-eye" aria-hidden="true"></i>
          &#8194;<?= Html::encode($rec->viewed)?>
        </div>
      </div>
    </div>
  <?php } ?>
  <?php
      echo LinkPager::widget([
          'pagination' => $pagination,
      ]);
  ?>
</div>
