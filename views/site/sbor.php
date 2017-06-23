<?php

use yii\helpers\Url;

$this->title = 'Сборы - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/sbor.css', ['depends' => ['app\assets\AppAsset']]);
?>

<div class="site-sbor">
  <div class="sbor-block">
    <h1>Спортивные сборы</h1>
  </div>
  <?php if(Yii::$app->session->getFlash('guestsbor')):?>
          <div class="alert alert-danger">
              <?= Yii::$app->session->getFlash('guestsbor'); ?>
          </div>
  <?php endif ?>
  <?php if(Yii::$app->session->getFlash('equalssbor')):?>
          <div class="alert alert-danger">
              <?= Yii::$app->session->getFlash('equalssbor'); ?>
          </div>
  <?php endif ?>

  <?php foreach($sbores as $sbor){?>
    <div class="sbor-element">
      <?php if($sbor->image !== null):?>
        <img class='lazy' data-original="/images/sbor/<?= $sbor->image ?>" alt="<?=$sbor->head?>">
      <?php endif; ?>
      <h2><?= $sbor->head?></h2>
      <hr class="hr-black">
      <p><b>Сборы будут проходить: </b> с <?=$sbor->dateBegin?> по <?=$sbor->dateEnd?></p>
      <p> <?= $sbor->description?></p>
      <p><b>Цена: </b><?=$sbor->price?> руб.</p>
      <a href="<?= Url::toRoute(['site/entrysbor', 'id'=> $sbor->id]);?>">Записаться</a>
    </div>
  <?php } ?>
</div>
