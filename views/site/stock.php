<?php

use yii\helpers\Html;

$this->title = 'Акции - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/stock.css', ['depends' => ['app\assets\AppAsset']]);

?>

<div class="site-stock">
  <div class="stock-block">
    <h1>Акции и предложения</h1>
    <hr>
  </div>

  <?php
  $flag = true;
  foreach ($stockes as $stock) {
    if ($flag) { ?>
      <div class="stock-white">
        <h2><?= Html::encode($stock->header) ?></h2>
        <hr>
        <p>
          <?= Html::encode($stock->description) ?>
        </p>
      </div>
    <?php  $flag = false;
    }

    else { ?>
      <div class="stock-gray">
        <h2><?= Html::encode($stock->header) ?></h2>
        <hr>
        <p>
          <?= Html::encode($stock->description) ?>
        </p>
      </div>
    <?php  $flag = true;
    }
  } ?>

  <div class="row site-stock-contact">
    <div class="col-lg-6 col-md-6">
      <i class="fa fa-phone fa-4x" aria-hidden="true"></i>
      <phone>&emsp;<?= Html::encode( $model->phone) ?></phone>
    </div>
    <div class="col-lg-6 col-md-6">
      <a href="<?= Html::encode( $model->vk) ?>" target="_blank">
        <img class='lazy' data-original="/images/backgrounds/vk.png" alt="vk"/>
      </a>
      <b>&emsp;</b>
      <a href="<?= Html::encode( $model->instagram) ?>" target="_blank">
        <img class='lazy' data-original="/images/backgrounds/instagram.png" alt="instagram"/>
      </a>
      <b>&emsp;</b>
      <a href="<?= Html::encode( $model->youtube) ?>" target="_blank">
        <img class='lazy' data-original="/images/backgrounds/youtube.png" alt="youtube"/>
      </a>
      <b>&emsp;</b>
      <a href="<?=Yii::$app->urlManager->createUrl('site/contact')?>">
        <img class='lazy' data-original="/images/backgrounds/message.png" alt="message"/>
      </a>
    </div>
  </div>

</div>
