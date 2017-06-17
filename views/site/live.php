<?php

use yii\helpers\Html;

$this->title = 'Трансляция - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/live.css', ['depends' => ['app\assets\AppAsset']]);
?>

<div class="site-live">
  <div class="live-block">
    <h1>Live - трансляция</h1>
  </div>
  <div class="iv-embed">
    <div class="iv-v">
      <iframe class="iv-i" src="https://open.ivideon.com/embed/v2/?server=100-8pYgDRCvZMkAgVyzGRspwH&amp;camera=0&amp;width=&amp;height=&amp;lang=ru"
        frameborder="0" allowfullscreen>
      </iframe>
    </div>
  </div>
</div>

<script src="//open.ivideon.com/embed/v2/embedded.js"></script>
