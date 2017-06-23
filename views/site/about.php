<?php

use yii\helpers\Html;

$this->title = 'О нас - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/about.css', ['depends' => ['app\assets\AppAsset']]);
$this->registerJsFile('@web/js/main.js', ['depends' => ['app\assets\AppAsset']],'main');
?>

<div class="site-about">
  <img class='lazy nhl' data-original="/images/backgrounds/about.jpg" alt="хоккей sniper about nhl">
  <div class="about-head">
    <h1>Центр подготовки хоккеистов Sniper</h1>
    <hr/>
  </div>

  <div class="about-we">
    <div class="row">
      <h2>Чем мы занимаемся</h2>
      <hr/>
      <div class="about-info">
        <p><?= Html::encode($page['we']) ?></p>
      </div>
      <div class="row about-contact">
        <div class="col-lg-4 col-md-4">
          <i class="fa fa-phone fa-3x" aria-hidden="true"></i>
          <phone>&emsp;<?= Html::encode($this->params['phone']) ?></phone>
        </div>
        <div class="col-lg-4 col-md-4">
          <a href="<?=Yii::$app->urlManager->createUrl('site/training')?>"><button class="btn">Записаться на тренировку</button></a>
        </div>
        <div class="col-lg-4 col-md-4">
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
  </div>

  <div class="coaches">
      <h2>Наши тренера</h2>
      <hr/>
      <?php foreach ($coaches as $coach){ ?>

        <div class="row">
          <div class="col-lg-5 col-md-5">
            <?php if ($coach->image !== null && $coach->image !== '') :?>
              <img class='lazy coach' data-original="/images/coaches/<?= Html::encode($coach->image) ?>" alt="тренер sniper">
            <?php endif ?>
            <?php if ($coach->vk !== null && $coach->vk !== '') :?>
            <div >
              <a href="<?= Html::encode($coach->vk) ?>" target="_blank">
                <img class='lazy' data-original="/images/backgrounds/vk.png" alt="vk"/>
              </a>
            </div>
            <?php endif ?>
          </div>

          <div class="col-lg-7 col-md-7 coaches-info">
            <h3><?= Html::encode($coach->firstName) ?>&emsp;<?= Html::encode($coach->lastName) ?></h3>
            <h4><?= Html::encode($coach->place) ?></h4>
            <p><?= Html::encode($coach->description) ?></p>
          </div>
        </div>

      <?php } ?>
  </div>

  <div class="equipment">
    <div class="row">
      <h2>Тренажеры и оборудование</h2>
      <hr/>
      <div class="about-info">
        <p><?= Html::encode($page['gym']) ?></p>
        <a class="stroke" href="<?=Yii::$app->urlManager->createUrl('site/trainer')?>">Подробнее</a>
      </div>
      <div class="row about-contact">
        <div class="col-lg-4 col-md-4">
          <i class="fa fa-phone fa-3x" aria-hidden="true"></i>
          <phone>&emsp;<?= Html::encode($this->params['phone']) ?></phone>
        </div>
        <div class="col-lg-4 col-md-4">
          <a href="<?=Yii::$app->urlManager->createUrl('site/training')?>"><button class="btn">Записаться на тренировку</button></a>
        </div>
        <div class="col-lg-4 col-md-4">
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
  </div>

  <div class="about-gallery">
    <div class="about-photo">
      <h2>Фотографии</h2>
      <hr/>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
          <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
          <?php
          $count = 0;
          foreach ($photos as $photo) {
            if($count == 0):?>
              <div class="item active">
                <a href="#win<?=$count?>" class="">
                  <img src="/images/photo/<?= Html::encode($photo->name) ?>" alt="">
                </a>
              </div>
            <?php else:?>
              <div class="item">
                <a href="#win<?=$count?>" class="">
                  <img src="/images/photo/<?= Html::encode($photo->name) ?>" alt="">
                </a>
              </div>
            <?php endif?>
          <?php $count++; } ?>
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
      <a class="stroke" href="<?=Yii::$app->urlManager->createUrl('site/photo')?>">Больше фотографий</a>
    </div>

    <?php
    $count = 0;
    foreach ($photos as $photo) {?>
      <a class="overlay" id="win<?=$count?>"></a>
      <div class="popup">
        <img src="/images/photo/<?= Html::encode($photo->name) ?>" alt="">
        <a class="close"title="Закрыть" href="#close"></a>
      </div>
    <?php $count++; } ?>
  </div>
</div>
