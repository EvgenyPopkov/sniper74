<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div style="text-align:center">
  <h2 style="font-size:1.4em; background-color: #dff0d8; color: #3c763d; padding:15px">Запись на сборы</h2>
  <div style="text-align:left">
    <h3>Имя:&#8194;<?= Html::encode($entry->user->firstName)?></h3>
    <h3>Пароль:&#8194;<?= Html::encode($entry->user->lastName)?></h3>
    <h3>Email:&#8194;<?= Html::encode($entry->user->email)?></h3>
    <h3>Телефон:&#8194;<?= Html::encode($entry->user->phone)?></h3><br><br>
    <h3>Сборы:&#8194;<?= $entry->sbor->head?></h3>
    <h3>Дата:&#8194;c <?= $entry->sbor->dateBegin?> по <?=$entry->sbor->dateBegin?></h3>
  <hr>
  </div>
  <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/index']);?>">
    <button style="padding:10px;font-size:1.5em;
      background-color: #5cb85c;border:1px solid #4cae4c;border-radius:10px;color: #f8f8f8;">
      Перейти на сайт
    </button>
  </a>
</div>
