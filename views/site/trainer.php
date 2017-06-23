<?php

use yii\helpers\Html;

$this->title = 'Тренажеры - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/trainer.css', ['depends' => ['app\assets\AppAsset']]);
?>

<div class="site-trainer">
  <div class="trainer-block">
    <h1>Тренажеры и оборудование</h1>
  </div>

  <?php foreach ($trainers as $trainer) { ?>
      <div class="trainer-white">
        <h2><?= Html::encode($trainer->name) ?></h2>
        <hr>
        <div class="row">
          <div class="col-lg-5 col-sm-5 col-md-5">
            <?php if ($trainer->image!==null && $trainer->image!==''):?>
            <img class="lazy" data-original="/images/trainer/<?= Html::encode($trainer->image) ?>" alt=<?= Html::encode($trainer->name) ?>>
          <?php endif; ?>
          </div>
          <div class="col-lg-7 col-sm-7 col-md-7">
            <p>
              <?= Html::encode($trainer->description) ?>
            </p>
          </div>
        </div>
      </div>
    <?php  } ?>
</div>
