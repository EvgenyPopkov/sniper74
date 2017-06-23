<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Статьи - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/article.css', ['depends' => ['app\assets\AppAsset']]);
?>

<div class="site-article">
  <div class="article-block">
    <h1>Статьи и обучающие материалы</h1>
  </div>
  <div class="row">

    <div class="col-lg-8 col-md-8">
      <?php foreach($articles as $article){?>
        <div class="article">
          <img class='lazy' data-original="/images/articles/<?= Html::encode($article->image) ?>" alt="<?= Html::encode($article->title) ?>">
          <h3><?= $article->category->name?></h3>
          <h2><?= $article->title?></h2>
          <hr class="hr-black">
          <p> <?= $article->description?></p>
          <div class="more">
            <a href="<?= Url::toRoute(['site/blog', 'id'=> $article->id]);?>">Подробнее</a>
          </div>
          <div class="row stat">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <?= $article->date?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <i class="fa fa-eye" aria-hidden="true"></i>
              &#8194;<?= $article->viewed?>
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

    <div class="col-lg-4 col-md-4">
      <div class="recent">
        <a href="<?= Url::toRoute(['site/recent']);?>"><h2>Последние статьи</h2></a>
        <?php foreach($recent as $rec){?>
          <img src="/images/articles/<?= Html::encode($rec->image) ?>" alt="<?= Html::encode($rec->title) ?>">
          <a href="<?= Url::toRoute(['site/blog', 'id'=> $rec->id]);?>"><h3><?= Html::encode($rec->title) ?></h3></a>
          <p><?= Html::encode($rec->date) ?></p>
          <hr>
        <?php } ?>
      </div>

      <div class="category">
        <h2>Категории</h2>
          <?php foreach($categories as $category){?>
            <div class="row">
              <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 categ">
              <a href="<?= Url::toRoute(['site/category', 'id'=> $category->id]);?>"><p><?= Html::encode($category->name) ?></p></a>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 categ-count">
              <a href="<?= Url::toRoute(['site/category', 'id'=> $category->id]);?>"><p>(<?= $category->count;?>)</p></a>
              </div>
            </div>
            <hr class="hr-categ">
          <?php } ?>
      </div>
    </div>
  </div>
</div>
