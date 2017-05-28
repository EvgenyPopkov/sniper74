<?php

use yii\helpers\Html;

$this->title = 'Sniper Хоккейный центр';
$this->params['address'] = $model->address;
$this->params['phone'] = $model->phone;
$this->params['email'] = $model->email;
$this->params['vk'] = $model->vk;
$this->params['instagram'] = $model->instagram;
$this->params['youtube'] = $model->youtube;
?>

<div class="market-landing">
<div class="landing-info">
  <h5>Добро пожаловать</h5>
  <h5>В центр подготовки хоккеистов <span class="color-green">Sniper</span></h5><br/>
  <h1><span>Мы подготавливаем хоккеистов</span></h1>
  <h1><span class="color-green">любого</span> возраста и уровня подготовки</h1>
  <a class="stroke" href="<?=Yii::$app->urlManager->createUrl('pages/contact')?>" title="">Свяжитесь с нами</a>
</div>

<div class="row">
  <div class="col-lg-4 col-md-4">
    <i class="fa fa-phone fa-4x" aria-hidden="true"></i>
    <phone>&emsp;<?= Html::encode($model->phone) ?></phone>
  </div>
  <div class="col-lg-4 col-md-4">
    <a href="<?=Yii::$app->urlManager->createUrl('pages/contact')?>"><button class="btn">Записаться на тренировку</button></a>
  </div>
  <div class="col-lg-4 col-md-4 social">
    <a href="<?= Html::encode($model->vk) ?>" target="_blank">
      <img class='lazy' data-original="/images/vk.png" alt="vk"/>
    </a>
    <b>&emsp;</b>
    <a href="<?= Html::encode($model->instagram) ?>" target="_blank">
      <img class='lazy' data-original="/images/instagram.png" alt="instagram"/>
    </a>
    <b>&emsp;</b>
    <a href="<?=Yii::$app->urlManager->createUrl('pages/contact')?>">
      <img class='lazy' data-original="/images/message.png" alt="message"/>
    </a>
  </div>
</div>
</div>
<div class="site-index">

  <div class="row we">
    <div class="col-lg-3 col-md-3">
      <img data-original="/images/index-we-left.jpg" alt="sniper hockey center" class="lazy img-left">
    </div>

    <div class="col-lg-6 col-md-6">
      <div class="index-we">
        <h3>немного о нас</h3>
        <h1>Хоккейный центр Sniper</h1>
      </div>
      <hr/>
      <p>
        Мы занимаемся подготовкой хоккеистов любого возраста и любого уровня подготовки.
        У нас Ваш ребенок научиться правильно кататься на коньках, улучшит технику владения шайбой,
        научиться точно и сильно выполнять кистевые броски и щелчки.
        Наш центр обеспечен современным оборудованием и тренерским составом, члены которого
        имееют многолетний хоккейный профессиональный опыт.
      </p>
      <a class="stroke" href="/site/about" title="">Узнать больше</a>
    </div>

    <div class="col-lg-3 col-md-3">
      <img data-original="/images/index-we-right.jpg" alt="sniper hockey center" class="lazy img-right">
    </div>

  </div>

  <div class="row training">
    <h1>Основные направления тренировок</h1>
    <hr/>

    <div class="col-lg-4 col-md-4">
      <div class="dribbling">
          <a href="#"><h3>Дриблинг</h3></a>
      </div>
    </div>

    <div class="col-lg-4 col-md-4">
      <div class="skating">
        <a href="#"><h3>Катание</h3></a>
      </div>
    </div>

    <div class="col-lg-4 col-md-4">
      <div class="shot">
        <a href="#"><h3>Броски</h3></a>
      </div>
    </div>

    <div class="row training-contact">
      <div class="col-lg-3 col-md-3 training-contact-phone">
        <i class="fa fa-phone fa-4x" aria-hidden="true"></i>
        <phone>&emsp;<?= Html::encode( $model->phone) ?></phone>
      </div>
      <div class="col-lg-6 col-md-6">
         <a class="stroke" href="/site/about" title="">Расписание тренировок</a>
      </div>
      <div class="col-lg-3 col-md-3 training-contact-social">
        <a href="<?= Html::encode( $model->vk) ?>" target="_blank">
          <img class='lazy' data-original="/images/vk.png" alt="vk"/>
        </a>
        <b>&emsp;</b>
        <a href="<?= Html::encode( $model->instagram) ?>" target="_blank">
          <img class='lazy' data-original="/images/instagram.png" alt="instagram"/>
        </a>
        <b>&emsp;</b>
        <a href="<?= Html::encode( $model->youtube) ?>" target="_blank">
          <img class='lazy' data-original="/images/youtube.png" alt="youtube"/>
        </a>
        <b>&emsp;</b>
        <a href="/pages/contact">
          <img class='lazy' data-original="/images/message.png" alt="message"/>
        </a>
      </div>
    </div>

  </div>

  <div class="amplua">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <div class="carousel-inner">
        <div class="item active">
          <img src="/images/forward.jpg" alt="Chania">
          <div class="carousel-caption">
            <h3>наши тренировки для всех</h3>
            <hr class="hr-white"/>
            <h1>Нападающие</h1>
            <hr/>
          </div>
        </div>

        <div class="item">
          <img src="/images/defender.jpg" alt="Chicago">
          <div class="carousel-caption">
            <h3>наши тренировки для всех</h3>
            <hr class="hr-white"/>
            <h1>Защитники</h1>
            <hr/>
          </div>
        </div>

        <div class="item">
          <img src="/images/goalkeeper.jpg" alt="New York">
          <div class="carousel-caption">
            <h3>наши тренировки для всех</h3>
            <hr class="hr-white"/>
            <h1>Вратари</h1>
            <hr/>
          </div>
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
  </div>

  <div class="row news">
    <h1>Новости</h1>
    <hr/>
    <div class="row subscribe">
      <div class="col-lg-8 col-md-8 subscribe-input">
        <input type="text" placeholder="Введите свой email">
      </div>

      <div class="col-lg-4 col-md-4 subscribe-btn">
        <button type="button">Подписаться на обновления</button>
      </div>
    </div>
  </div>

</div>
