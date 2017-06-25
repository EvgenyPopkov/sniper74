<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Видеозаписи - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/video.css', ['depends' => ['app\assets\AppAsset']]);

?>

<div class="site-video">
  <div class="video-block">
    <h1>Видеозаписи</h1>
  </div>
  <?php for($i = 0 ; $i < count($videos); $i += 3){?>
    <div class="video">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4">
            <iframe src="<?= Html::encode($videos[$i]->name)?>" frameborder="0" allowfullscreen></iframe>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4">
            <iframe src="<?= Html::encode($videos[$i + 1]->name)?>" frameborder="0" allowfullscreen></iframe>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4">
            <iframe src="<?= Html::encode($videos[$i + 2]->name)?>" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
    </div>
  <?php } ?>

  <?php
      echo LinkPager::widget([
          'pagination' => $pagination,
      ]);
  ?>
</div>
