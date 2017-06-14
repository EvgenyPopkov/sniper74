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
        <p><?= Html::encode($page->we) ?></p>
      </div>
      <div class="row about-contact">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <i class="fa fa-phone fa-3x" aria-hidden="true"></i>
          <phone>&emsp;<?= Html::encode($model->phone) ?></phone>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <a href="<?=Yii::$app->urlManager->createUrl('site/training')?>"><button class="btn">Записаться на тренировку</button></a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <a href="<?= Html::encode($model->vk) ?>" target="_blank">
            <img class='lazy' data-original="/images/backgrounds/vk.png" alt="vk"/>
          </a>
          <b>&emsp;</b>
          <a href="<?= Html::encode($model->instagram) ?>" target="_blank">
            <img class='lazy' data-original="/images/backgrounds/instagram.png" alt="instagram"/>
          </a>
          <b>&emsp;</b>
          <a href="<?=Yii::$app->urlManager->createUrl('site/contact')?>">
            <img class='lazy' data-original="/images/backgrounds/message.png" alt="message"/>
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
          <div class="col-lg-4 col-md-4">
            <img class='lazy coach' data-original="/images/coaches/<?= Html::encode($coach->image) ?>" alt="тренер sniper">
            <div >
              <a href="<?= Html::encode($coach->vk) ?>" target="_blank">
                <img class='lazy' data-original="/images/backgrounds/vk.png" alt="vk"/>
              </a>
            </div>
          </div>

          <div class="col-lg-8 col-md-8 coaches-info">
            <h3><?= Html::encode($coach->firstName) ?>&emsp;<?= Html::encode($coach->lastName) ?></h3>
            <h4><?= Html::encode($coach->place) ?></h4>
            <p><?= Html::encode($coach->description) ?></p>
          </div>
        </div>
        <hr class='hr-black' />

      <?php } ?>
  </div>

  <div class="equipment">
    <div class="row">
      <h2>Тренажеры и оборудование</h2>
      <hr/>
      <div class="about-info">
        <p><?= Html::encode($page->gym) ?></p>
        <a class="stroke" href="<?=Yii::$app->urlManager->createUrl('site/trainer')?>">Подробнее</a>
      </div>
      <div class="row about-contact">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <i class="fa fa-phone fa-3x" aria-hidden="true"></i>
          <phone>&emsp;<?= Html::encode($model->phone) ?></phone>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <a href="<?=Yii::$app->urlManager->createUrl('site/training')?>"><button class="btn">Записаться на тренировку</button></a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <a href="<?= Html::encode($model->vk) ?>" target="_blank">
            <img class='lazy' data-original="/images/backgrounds/vk.png" alt="vk"/>
          </a>
          <b>&emsp;</b>
          <a href="<?= Html::encode($model->instagram) ?>" target="_blank">
            <img class='lazy' data-original="/images/backgrounds/instagram.png" alt="instagram"/>
          </a>
          <b>&emsp;</b>
          <a href="<?=Yii::$app->urlManager->createUrl('site/contact')?>">
            <img class='lazy' data-original="/images/backgrounds/message.png" alt="message"/>
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
          <div class="item active">
            <a href="#win0" class="">
              <img src="/images/carouselAbout/carousel-1.jpg" alt="катание на коньках">
            </a>
          </div>
          <div class="item">
            <a href="#win1" class="">
              <img src="/images/carouselAbout/carousel-2.jpg" alt="Chania">
            </a>
          </div>
          <div class="item">
            <a href="#win2" class="">
              <img src="/images/carouselAbout/carousel-3.jpg" alt="Chicago">
            </a>
          </div>
          <div class="item">
            <a href="#win3" class="">
              <img src="/images/carouselAbout/carousel-4.jpg" alt="New York">
            </a>
          </div>
          <div class="item">
            <a href="#win4" class="">
              <img src="/images/carouselAbout/carousel-5.jpg" alt="Chania">
            </a>
          </div>
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
      <a class="stroke" href="#">Больше фотографий</a>

    </div>

    <a class="overlay" id="win0"></a>
    <div class="popup">
      <img src="/images/carouselAbout/carousel-1.jpg" alt="Chania">
      <a class="close"title="Закрыть" href="#close"></a>
    </div>

    <a class="overlay" id="win1"></a>
    <div class="popup">
      <img src="/images/carouselAbout/carousel-2.jpg" alt="Chania">
      <a class="close"title="Закрыть" href="#close"></a>
    </div>

    <a class="overlay" id="win2"></a>
    <div class="popup">
      <img src="/images/carouselAbout/carousel-3.jpg" alt="Chania">
      <a class="close"title="Закрыть" href="#close"></a>
    </div>

    <a class="overlay" id="win3"></a>
    <div class="popup">
      <img src="/images/carouselAbout/carousel-4.jpg" alt="Chania">
      <a class="close"title="Закрыть" href="#close"></a>
    </div>

    <a class="overlay" id="win4"></a>
    <div class="popup">
      <img src="/images/carouselAbout/carousel-5.jpg" alt="Chania">
      <a class="close"title="Закрыть" href="#close"></a>
    </div>

  </div>

  </div>

</div>
