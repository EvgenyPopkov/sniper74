<?php

use yii\helpers\Html;

$this->title = 'Тренировочный процесс - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/process.css', ['depends' => ['app\assets\AppAsset']]);
?>

<div class="site-process">
  <div class="process-block">
    <h1>Тренировочный процесс</h1>
    <hr>
    <h4><?= Html::encode($page->training) ?></h4>
  </div>

  <div class="row training-one">
    <?php for ($count = 0; $count < 3; ++$count) {?>
      <div class="col-lg-4">
        <img class='lazy' data-original="/images/training/<?= Html::encode($program[$count]['image']) ?>" alt="владение шайбой">
        <h3><?= Html::encode($program[$count]['name']) ?></h3>
        <p class="process-training-head">
          <?= Html::encode($program[$count]['description']) ?>
        </p>
        <p>
          <h5>Упражнения:</h5>
          <ul class="rounded">
            <?php foreach ($program[$count]['task'] as $task) {?>
              <li><?= Html::encode($task['task']) ?></li>
            <?php } ?>
          </ul>
        </p>
        <hr class='hr-training'/>
      </div>
    <?php } ?>
  </div>

  <div class="row training-two">
    <?php for ($count = 3; $count < 6; ++$count) {?>
      <div class="col-lg-4">
        <img class='lazy' data-original="/images/training/<?= Html::encode($program[$count]['image']) ?>" alt="владение шайбой">
        <h3><?= Html::encode($program[$count]['name']) ?></h3>
        <p class="process-training-head">
          <?= Html::encode($program[$count]['description']) ?>
        </p>
        <p>
          <h5>Упражнения:</h5>
          <ul class="rounded">
            <?php foreach ($program[$count]['task'] as $task) {?>
              <li><?= Html::encode($task['task']) ?></li>
            <?php } ?>
          </ul>
        </p>
        <hr class='hr-training'/>
      </div>
    <?php } ?>
  </div>

  <div class="process-video">
    <h1 class="age"><?= Html::encode($page->footer) ?></h1>
    <a class="stroke" href="<?=Yii::$app->urlManager->createUrl('site/video')?>">Видео с тренировок</a>
  </div>
</div>
