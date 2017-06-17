<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Тренировки - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/training.css', ['depends' => ['app\assets\AppAsset']]);
$this->registerJsFile('@web/js/training.js', ['depends' => ['app\assets\AppAsset']]);
?>
<div class="site-training">
  <div class="training-block">
    <h1>Тренировки</h1>
  </div>

  <div class="row training-nav">
    <div class="col-lg-6 col-md-6">
      <a id='earth-link' class="active-type"><button id="btn-earth">Тренировки в зале</button></a>
    </div>

    <div class="col-lg-6 col-md-6">
      <a id='ice-link'><button id="btn-ice">Тренировки на льду</button></a>
    </div>
  </div>

  <?php function getDateName($value){
    switch ($value) {
        case 1:
            return "Понедельник";
            break;
        case 2:
            return "Вторник";
            break;
        case 3:
            return "Среда";
            break;
        case 4:
            return "Четверг";
            break;
        case 5:
            return "Пятница";
            break;
        case 6:
            return "Суббота";
            break;
        case 7:
            return "Воскресенье";
            break;
    }
  } ?>

  <?php if(Yii::$app->session->getFlash('guestentry')):?>
          <div class="alert alert-danger">
              <?= Yii::$app->session->getFlash('guestentry'); ?>
          </div>
  <?php endif ?>

  <div class="row earth">
    <h2>Спортивный зал</h2>
    <hr class='hr-shedule'>
    <table class="table table-hover table-bordered">
      <tr class="success tab-head">
          <td>День недели</td>
          <td>Описание</td>
          <td>Время</td>
          <td>Цена, руб</td>
          <td>Адрес</td>
          <td>Запись</td>
      </tr>
      <?php foreach ($earth as $value) {?>
        <?php foreach ($value->times as $time) { ?>
          <tr>
            <td><?= Html::encode(getDateName($value->day))?></td>
            <td><?= Html::encode($value->description)?></td>
            <td><?= Html::encode($time->begin)?> - <?= Html::encode($time->end)?></td>
            <td><?= Html::encode($value->price)?></td>
            <td><?= Html::encode($time->address->address)?></td>
            <td><a href="<?=Url::toRoute(['site/entry','id'=> $time->id])?>"><button class="btn btn-primary">Записаться</button></a></td>
          </tr>
          <?php } ?>
      <?php } ?>
    </table>
  </div>

  <div class="row ice earth-ice-none">
    <h2>Лед</h2>
    <hr class='hr-shedule'>
    <table class="table table-hover table-bordered">
      <tr class="success tab-head">
          <td>День недели</td>
          <td>Описание</td>
          <td>Время</td>
          <td>Цена, руб</td>
          <td>Адрес</td>
          <td>Запись</td>
      </tr>
      <?php  foreach ($ice as $value) {?>
        <?php foreach ($value->times as $time) { ?>
          <tr>
            <td><?= Html::encode(getDateName($value->day))?></td>
            <td><?= Html::encode($value->description)?></td>
            <td><?= Html::encode($time->begin)?> - <?= Html::encode($time->end)?></td>
            <td><?= Html::encode($value->price)?></td>
            <td><?= Html::encode($time->address->address)?></td>
            <td><a href="<?=Url::toRoute(['site/entry','id'=> $time->id])?>"><button class="btn btn-primary">Записаться</button></a></td>
          </tr>
          <?php } ?>
      <?php } ?>
    </table>
  </div>

  <div class="row site-training-contact">
    <div class="col-lg-6 col-md-6">
      <i class="fa fa-phone fa-4x" aria-hidden="true"></i>
      <phone>&emsp;<?= Html::encode( $model['phone']) ?></phone>
    </div>
    <div class="col-lg-6 col-md-6">
      <a href="<?= Html::encode( $model['vk']) ?>" target="_blank">
        <img class='lazy' data-original="/images/backgrounds/vk.png" alt="vk"/>
      </a>
      <b>&emsp;</b>
      <a href="<?= Html::encode( $model['instagram']) ?>" target="_blank">
        <img class='lazy' data-original="/images/backgrounds/instagram.png" alt="instagram"/>
      </a>
      <b>&emsp;</b>
      <a href="<?= Html::encode( $model['youtube']) ?>" target="_blank">
        <img class='lazy' data-original="/images/backgrounds/youtube.png" alt="youtube"/>
      </a>
      <b>&emsp;</b>
      <a href="<?=Yii::$app->urlManager->createUrl('site/contact')?>">
        <img class='lazy' data-original="/images/backgrounds/message.png" alt="message"/>
      </a>
    </div>
  </div>
</div>
