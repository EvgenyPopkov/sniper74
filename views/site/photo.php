<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Фотографии - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/photo.css', ['depends' => ['app\assets\AppAsset']]);

?>

<div class="site-photo">
  <div class="photo-block">
    <h1>Фотографии</h1>
  </div>
<?php
$count = 0;
for($i = 0 ; $i < count($photos); $i += 3){?>

  <div class="photo">
      <a href="#win<?=$count?>"><img src="/images/photo/<?= Html::encode($photos[$i]->name)?>" alt=""></a>
      <a href="#win<?=$count + 1?>"><img src="/images/photo/<?= Html::encode($photos[$i + 1]->name)?>" alt=""></a>
      <a href="#win<?=$count + 2?>"><img src="/images/photo/<?= Html::encode($photos[$i + 2]->name)?>" alt=""></a>
  </div>

  <a class="overlay" id="win<?=$count?>"></a>
  <div class="popup">
    <img class="lazy" data-original="/images/photo/<?= Html::encode($photos[$i]->name)?>" alt="">
    <a class="close"title="Закрыть" href="#close"></a>
  </div>

  <a class="overlay" id="win<?=$count + 1?>"></a>
  <div class="popup">
    <img class="lazy" data-original="/images/photo/<?= Html::encode($photos[$i + 1]->name)?>" alt="">
    <a class="close"title="Закрыть" href="#close"></a>
  </div>

  <a class="overlay" id="win<?=$count + 2?>"></a>
  <div class="popup">
    <img class="lazy" data-original="/images/photo/<?= Html::encode($photos[$i + 2]->name)?>" alt="">
    <a class="close"title="Закрыть" href="#close"></a>
  </div>
  <?php $count += 3; } ?>

  <?php
      echo LinkPager::widget([
          'pagination' => $pagination,
      ]);
  ?>
</div>
