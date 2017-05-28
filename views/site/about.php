<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'О нас - Sniper Хоккейный центр';
$this->params['address'] = $model->address;
$this->params['phone'] = $model->phone;
$this->params['email'] = $model->email;
$this->params['vk'] = $model->vk;
$this->params['instagram'] = $model->instagram;
$this->params['youtube'] = $model->youtube;
?>
<div class="site-about">
  <div class="about-head">
    <h1>Центр подготовки хоккеистов Sniper</h1>
    <hr/>
  </div>
  <div class="about-we">
    <div class="row">
      <h2>Чем мы занимаемся</h2>
      <hr/>
      <div class="col-lg-8 col-md-8 about-info">
        <p>
          Мы занимаемся подготовкой хоккеистов любого возраста и любого уровня подготовки.
          Ваш ребенок будет развиваться во всех хоккейных аспектах, особое внимание будет уделяться навыкам и умениям,
          которые больше нужны для его игровой позиции. Наш центр регулярно проводит сборы,
          благодаря которым ваш ребенок качественно повысит уровень своей игры. У нас работает молодая команда специалистов,
          которые имеют профессиональный хоккейный опыт. Мы имеем современное оборудование для различных тренировок.
          Наши тренировки проходят в спортивном зале и на хоккейной площадке.
        </p>
      </div>
      <div class="col-lg-3 col-md-3 about-contact">
        <div>
          <i class="fa fa-phone fa-2x" aria-hidden="true"></i>
          <phone>&emsp;<?= Html::encode($model->phone) ?></phone>
        </div>
        <div>
          <a href="<?=Yii::$app->urlManager->createUrl('pages/contact')?>"><button class="btn">Записаться на тренировку</button></a>
        </div>
        <div>
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
  </div>
</div>
