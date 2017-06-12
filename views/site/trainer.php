<?php

use yii\helpers\Html;

$this->title = 'Тренажеры - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/trainer.css', ['depends' => ['app\assets\AppAsset']]);
?>

<div class="site-trainer">
  <div class="trainer-block">
    <h1>Тренажеры и оборудование</h1>
    <hr>
  </div>

  <?php
  $flag = true;
  foreach ($trainers as $trainer) {
    if ($flag) { ?>
      <div class="trainer-white">
        <h2><?= Html::encode($trainer->name) ?></h2>
        <hr>
        <div class="row">
          <div class="col-lg-5 col-sm-5 col-md-5">
            <img src="/images/trainer/<?= Html::encode($trainer->image) ?>" alt=<?= Html::encode($trainer->name) ?>>
          </div>
          <div class="col-lg-7 col-sm-7 col-md-7">
            <p>
              <?= Html::encode($trainer->description) ?>
            </p>
          </div>
        </div>
      </div>
    <?php  $flag = false;
    }

    else { ?>
      <div class="trainer-gray">
        <h2><?= Html::encode($trainer->name) ?></h2>
        <hr>
        <div class="row">
          <div class="col-lg-5 col-sm-5 col-md-5">
            <img src="/images/trainer/<?= Html::encode($trainer->image) ?>" alt=<?= Html::encode($trainer->name) ?>>
          </div>
          <div class="col-lg-7 col-sm-7 col-md-7">
            <p>
              <?= Html::encode($trainer->description) ?>
            </p>
          </div>
        </div>
      </div>
    <?php  $flag = true;
    }
  } ?>
</div>
