<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div style="text-align:center">
  <h2 style="font-size:1.4em; background-color: #222;color: #f8f8f8; padding:15px">Добро пожаловать в sniper74.ru</h2>
  <hr>
  <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['auth/signup', 'email' => Html::encode($email)]);?>">
    <button style="padding:10px;font-size:1.5em;
      background-color: #5cb85c;border:1px solid #4cae4c;border-radius:10px;color: #f8f8f8;">
      Подтвердите регистрацию
    </button>
  </a>
</div>
