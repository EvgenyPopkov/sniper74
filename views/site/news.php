<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Новости - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/news.css', ['depends' => ['app\assets\AppAsset']]);
?>

<div class="site-news">
  <div class="news-block">
    <h1>Новости</h1>
  </div>
  <?php foreach($news as $new){?>
    <div class="news-element">
      <?php if($new->image !== null && $new->image !== ''):?>
        <img class='lazy' data-original="/images/news/<?= Html::encode($new->image) ?>" alt="<?= Html::encode($new->name) ?>">
      <?php endif; ?>
      <h2><?= $new->name?></h2>
      <hr class="hr-black">
      <p> <?= $new->content?></p>
    </div>
  <?php } ?>

  <?php
      echo LinkPager::widget([
          'pagination' => $pagination,
      ]);
  ?>
</div>
