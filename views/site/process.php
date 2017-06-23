<?php

use yii\helpers\Html;

$this->title = 'Тренировочный процесс - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/process.css', ['depends' => ['app\assets\AppAsset']]);
?>

<div class="site-process">
  <div class="process-block">
    <h1>Тренировочный процесс</h1>
    <hr>
    <h4><?= Html::encode($page['training']) ?></h4>
  </div>

  <?php for ($i = 0; $i < count($programs); $i+=3) { ?>
    <div class="row training-one">
        <div class="col-lg-4">
          <img class='lazy' data-original="/images/training/<?= Html::encode($programs[$i]->image) ?>" alt="владение шайбой">
          <h3><?= Html::encode($programs[$i]->name) ?></h3>
          <p class="process-training-head">
            <?= Html::encode($programs[$i]->description) ?>
          </p>
          <p>
            <h5>Упражнения:</h5>
            <ul class="rounded">
              <?php foreach ($programs[$i]->tasks as $task) {?>
                <li><?= Html::encode($task->name) ?></li>
              <?php } ?>
            </ul>
          </p>
        </div>
        <div class="col-lg-4">
          <img class='lazy' data-original="/images/training/<?= Html::encode($programs[$i + 1]->image) ?>" alt="владение шайбой">
          <h3><?= Html::encode($programs[$i + 1]->name) ?></h3>
          <p class="process-training-head">
            <?= Html::encode($programs[$i + 1]->description) ?>
          </p>
          <p>
            <h5>Упражнения:</h5>
            <ul class="rounded">
              <?php foreach ($programs[$i + 1]->tasks as $task) {?>
                <li><?= Html::encode($task->name) ?></li>
              <?php } ?>
            </ul>
          </p>
        </div>
        <div class="col-lg-4">
          <img class='lazy' data-original="/images/training/<?= Html::encode($programs[$i + 2]->image) ?>" alt="владение шайбой">
          <h3><?= Html::encode($programs[$i + 2]->name) ?></h3>
          <p class="process-training-head">
            <?= Html::encode($programs[$i + 2]->description) ?>
          </p>
          <p>
            <h5>Упражнения:</h5>
            <ul class="rounded">
              <?php foreach ($programs[$i + 2]->tasks as $task) {?>
                <li><?= Html::encode($task->name) ?></li>
              <?php } ?>
            </ul>
          </p>
        </div>
    </div>
    <?php } ?>

  <div class="process-video">
    <h1 class="age"><?= Html::encode($page['footer']) ?></h1>
    <a class="stroke" href="<?=Yii::$app->urlManager->createUrl('site/video')?>">Видео с тренировок</a>
  </div>
</div>
