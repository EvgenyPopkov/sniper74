<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Sniper Хоккейный центр';
$this->registerCssFile('@web/css/index.css', ['depends' => ['app\assets\AppAsset']]);
$this->registerJsFile('@web/js/main.js', ['depends' => ['app\assets\AppAsset']],'main');
?>

<div class="market-landing">
  <div class="landing-info">
    <h5>Добро пожаловать</h5>
    <h5>В центр подготовки хоккеистов <span class="color-green">Sniper</span></h5><br/>
    <h1><span>Мы подготавливаем хоккеистов</span></h1>
    <h1><span class="color-green">любого</span> возраста и уровня подготовки</h1>
    <a class="stroke" href="<?=Url::toRoute('site/contact')?>" title="">Свяжитесь с нами</a>
  </div>

  <div class="row">
    <div class="col-lg-4 col-md-4">
      <i class="fa fa-phone fa-4x" aria-hidden="true"></i>
      <phone>&emsp;<?= Html::encode($this->params['phone']) ?></phone>
    </div>
    <div class="col-lg-4 col-md-4">
      <a href="<?=Url::toRoute('site/training')?>"><button class="btn">Записаться на тренировку</button></a>
    </div>
    <div class="col-lg-4 col-md-4 social">
      <a href="<?= Html::encode($this->params['vk']) ?>" target="_blank">
        <img class='lazy' data-original="/images/backgrounds/vk.png" alt="vk"/>
      </a>
      &emsp;
      <a href="<?= Html::encode($this->params['instagram']) ?>" target="_blank">
        <img class='lazy' data-original="/images/backgrounds/instagram.png" alt="instagram"/>
      </a>
      &emsp;
      <a href="<?= Html::encode( $this->params['youtube']) ?>" target="_blank">
        <img class='lazy' data-original="/images/backgrounds/youtube.png" alt="youtube"/>
      </a>
    </div>
  </div>
</div>

<div class="site-index">

  <div class="row we">
    <div class="col-lg-3 col-md-3">
      <img data-original="/images/index/index-we-left.jpg" alt="sniper hockey center" class="lazy img-left">
    </div>

    <div class="col-lg-6 col-md-6">
      <div class="index-we">
        <h3>немного о нас</h3>
        <h1>Хоккейный центр Sniper</h1>
      </div>
      <hr>
      <p> <?= Html::encode($page['we']) ?> </p>
      <a class="stroke" href="<?=Url::toRoute('site/about')?>" title="">Узнать больше</a>
    </div>

    <div class="col-lg-3 col-md-3">
      <img data-original="/images/index/index-we-right.jpg" alt="sniper hockey center" class="lazy img-right">
    </div>
  </div>

  <div class="row training">
    <h1>Основные направления тренировок</h1>
    <hr>

    <div class="col-lg-4 col-md-4">

      <div class="dribbling">
        <img class='lazy' data-original="/images/index/<?= Html::encode($page['imageDribbling']) ?> " alt="владение шайбой">
          <a href="<?=Url::toRoute('site/process')?>"><h3>Дриблинг</h3></a>
      </div>
    </div>

    <div class="col-lg-4 col-md-4">
      <div class="skating">
          <img class='lazy' data-original="/images/index/<?= Html::encode($page['imageScating']) ?> " alt="владение шайбой">
        <a href="<?=Url::toRoute('site/process')?>"><h3>Катание</h3></a>
      </div>
    </div>

    <div class="col-lg-4 col-md-4">
      <div class="shot">
          <img class='lazy' data-original="/images/index/<?= Html::encode($page['imageShot']) ?> " alt="владение шайбой">
        <a href="<?=Url::toRoute('site/process')?>"><h3>Броски</h3></a>
      </div>
    </div>

    <p>Наши тренировки для нападающих, защитников и вратарей</p>

    <div class="row training-contact">
      <div class="col-lg-3 col-md-3 training-contact-phone">
        <i class="fa fa-phone fa-4x" aria-hidden="true"></i>
        <phone>&emsp;<?= Html::encode( $this->params['phone']) ?></phone>
      </div>
      <div class="col-lg-6 col-md-6">
         <a class="stroke" href="<?=Url::toRoute('site/training')?>" title="">Расписание тренировок</a>
      </div>
      <div class="col-lg-3 col-md-3 training-contact-social">
        <a href="<?= Html::encode( $this->params['vk']) ?>" target="_blank">
          <img class='lazy' data-original="/images/backgrounds/vk.png" alt="vk"/>
        </a>
        &emsp;
        <a href="<?= Html::encode( $this->params['instagram']) ?>" target="_blank">
          <img class='lazy' data-original="/images/backgrounds/instagram.png" alt="instagram"/>
        </a>
        &emsp;
        <a href="<?= Html::encode( $this->params['youtube']) ?>" target="_blank">
          <img class='lazy' data-original="/images/backgrounds/youtube.png" alt="youtube"/>
        </a>
        &emsp;
      </div>
    </div>
  </div>

  <div class="articles">
    <h1>Статьи и обучающие материалы</h1>
    <hr>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <div class="carousel-inner">
        <?php
        $i = 0;
        foreach ($articles as $article) {
          if($i == 0):?>
          <div class="item active">
            <a href="#win<?=$i?>" class="">
              <div class="article">
                <img src="/images/articles/<?= Html::encode($article->image) ?>" alt="<?= Html::encode($article->title) ?>">
                <a href="<?= Url::toRoute(['site/blog', 'id'=> $article->id]);?>"><h2><?= Html::encode($article->title) ?></h2></a>
              </div>
            </a>
          </div>
          <?php else:?>
            <div class="item">
              <a href="#win<?=$i?>" class="">
                <div class="article">
                  <img src="/images/articles/<?= Html::encode($article->image) ?>" alt="<?= Html::encode($article->title) ?>">
                  <a href="<?= Url::toRoute(['site/blog', 'id'=> $article->id]);?>"><h2><?= Html::encode($article->title) ?></h2></a>
                </div>
              </a>
            </div>
          <?php endif?>
        <?php  $i++; } ?>
      </div>

      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <a class="stroke" href="<?=Url::toRoute('site/article')?>">Раздел статей</a>
  </div>

  <div class="row news">
    <h1>Новости</h1>
    <hr>
      <?php foreach ($news as $new) { ?>
        <div class="index-news">
          <h3><?=$new->name?></h3>
          <hr>
          <p><?=$new->content?></p>
        </div>
      <?php } ?>
    <a class="stroke" href="<?=Url::toRoute('site/news')?>">Больше новостей</a>
  </div>

</div>
