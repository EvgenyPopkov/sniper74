<?php

use yii\helpers\Html;

$this->title = 'Акции - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/stock.css', ['depends' => ['app\assets\AppAsset']]);

?>

<div class="site-stock">
  <div class="stock-block">
    <h1>Акции и предложения</h1>
  </div>

  <?php foreach ($stockes as $stock) { ?>
      <div class="stock-white">
        <h2><?= Html::encode($stock->header) ?></h2>
        <hr>
        <p>
          <?= Html::encode($stock->description) ?>
        </p>
      </div>
  <?php } ?>

  <div class="row site-stock-contact">
    <div class="col-lg-6 col-md-6">
      <i class="fa fa-phone fa-4x" aria-hidden="true"></i>
      <phone>&emsp;<?= Html::encode( $this->params['phone']) ?></phone>
    </div>
    <div class="col-lg-6 col-md-6">
      <a href="<?= Html::encode( $this->params['vk']) ?>" target="_blank">
        <img class='lazy' data-original="/images/backgrounds/vk.png" alt="vk"/>
      </a>
      &emsp;
      <a href="<?= Html::encode( $this->params['instagram']) ?>" target="_blank">
        <img class='lazy' data-original="/images/backgrounds/instagram.png" alt="instagram"/>
      </a>
      &emsp;
      <a href="<?= Html::encode( $this->params['youtube']) ?>" target="_blank">
        <img class='lazy' data-original="/images/backgrounds/youtube.png" alt="youtube"/>
      </a>
    </div>
  </div>

</div>
