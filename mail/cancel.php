<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div style="text-align:center">
  <h2 style="font-size:1.4em; background-color: #f2dede; color: #a94442; padding:15px">Отмена записи на тренировку</h2>
  <div style="text-align:left">
    <h3>Имя:&emsp;<?= Html::encode($entry->user->firstName)?></h3>
    <h3>Пароль:&emsp;<?= Html::encode($entry->user->lastName)?></h3>
    <h3>Email:&emsp;<?= Html::encode($entry->user->email)?></h3>
    <h3>Телефон:&emsp;<?= Html::encode($entry->user->phone)?></h3><br><br>
    <h3>Тренировка:&emsp;<?= Html::encode($entry->time->training->description)?></h3>
    <h3>Дата:&emsp;<?= Html::encode($entry->date)?></h3>
    <h3>Время:&emsp;<?= Html::encode($entry->time->begin)?>-<?= Html::encode($entry->time->end)?></h3>
    <hr>
  </div>
  <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/index']);?>">
    <button style="padding:10px;font-size:1.5em;
      background-color: #5cb85c;border:1px solid #4cae4c;border-radius:10px;color: #f8f8f8;">
      Перейти на сайт
    </button>
  </a>
</div>
