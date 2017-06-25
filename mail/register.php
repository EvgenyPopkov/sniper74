<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div style="background-color:#d4d4d4; padding:40px 10vw;">
  <div style="text-align:center; background-color:#f8f8f8;">
    <h2 style="font-size:1.4em; background-color: #222;color: #f8f8f8; padding:25px;">Добро пожаловать в sniper74.ru</h2>
    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['auth/signup', 'email' => Html::encode($email)]);?>">
      <button style="padding:10px;font-size:1.5em;
        background-color: #5cb85c;border:1px solid #4cae4c;border-radius:10px;color: #f8f8f8; margin:20px auto;">
        Подтвердите регистрацию
      </button>
    </a>
  </div>
</div>
