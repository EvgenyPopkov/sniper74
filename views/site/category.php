<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Статьи - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/category.css', ['depends' => ['app\assets\AppAsset']]);
?>

<div class="site-category">
  <div class="category-block">
    <h1><?= Html::encode($articles[0]->category->name) ?></h1>
    <hr>
  </div>
  <?php foreach($articles as $article){?>
    <div class="category">
      <img class='lazy' data-original="/images/articles/<?= Html::encode($article->image) ?>" alt="<?= Html::encode($article->title) ?>">
      <h3><?= Html::encode($article->category->name)?></h3>
      <h2><?= Html::encode($article->title)?></h2>
      <hr class="hr-black">
      <p> <?= Html::encode($article->description)?></p>
      <div class="more">
        <a href="<?= Url::toRoute(['site/blog', 'id'=> $article->id]);?>">Подробнее</a>
      </div>
      <div class="row stat">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          <?= Html::encode($article->date)?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          <i class="fa fa-eye" aria-hidden="true"></i>
          &#8194;<?= Html::encode($article->viewed)?>
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
