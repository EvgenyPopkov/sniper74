<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div style="background-color:#d4d4d4; padding:40px 10vw;">
  <div style="text-align:center; background-color:#f8f8f8;">
    <h2 style="font-size:1.4em; background-color: #222;color: #f8f8f8; padding:25px;">Здравствуйте, <?= Html::encode($user->firstName)?></h2>
    <h1 style="font-size:1.4em; margin:40px auto;">Ваш новый пароль: <b style="font-size:1.5em; color:#222;background-color: #d4d4d4"><?= Html::encode($pass)?></b></h1>
    <hr>
    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/index']);?>">
      <button style="padding:10px;font-size:1.5em;
        background-color: #5cb85c;border:1px solid #4cae4c;border-radius:10px;color: #f8f8f8; margin:20px auto;">
        Перейти на сайт
      </button>
    </a>
  </div>
</div>
