<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div style="text-align:center">
  <h2 style="font-size:1.8em; background-color: #dff0d8; color: #3c763d; padding:15px;"><?=$news->name?></h2>
  <?php if($news->image !== null && $news->image !== '') : ?>
    <img src="<?= $message->embed($image); ?>" style="margin: 20px auto; width: 60%;">
  <?php endif; ?>
  <h3 style="font-size:1.5em; padding:20px 20%;"><?=$news->content?></h3>
  <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/index']);?>">
    <button style="padding:10px;font-size:1.5em;
      background-color: #5cb85c;border:1px solid #4cae4c;border-radius:10px;color: #f8f8f8;">
      Перейти на сайт
    </button>
  </a>
  <hr style="margin: 20px auto;">
  <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['auth/unsubscribe', 'email' => Html::encode($email)]);?>">
    <button style="padding:10px;font-size:1em;
      background-color: #c9302c;border:1px solid #ac2925;border-radius:10px;color: #f8f8f8;">
      Отписаться от обновлений
    </button>
  </a>
</div>
