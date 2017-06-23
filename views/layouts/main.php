<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link href="//fonts.googleapis.com/css?family=Neucha|Roboto&amp;subset=cyrillic" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="block">
  <div class="loading">
    <span class="ball1"></span>
    <span class="ball2"></span>
  </div>
</div>

<div class="wrap">

  <header>
      <?php
        NavBar::begin([
            'brandLabel' => Html::img('@web/images/backgrounds/logo.png', ['alt'=>Yii::$app->name]),
            'brandUrl' => ['/site/index'],
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top navbar-scroll',
            ],
        ]);
      ?>

      <?php
        if($this->params['sbor']):
          $items[] = ['label' => 'СБОРЫ', 'options' => ['class' => 'label-sbor'] ,'url' => ['/site/sbor']];
        endif;
        $items[] = ['label' => 'ГЛАВНАЯ', 'url' => ['/site/index']];
        $items[] = ['label' => 'О НАС', 'items' => [
          [
            'label' => 'О нас', 'url' => ['/site/about']
          ],
          [
            'label' => 'Тренировочный процесс', 'url' => ['/site/process']
          ],
          [
            'label' => 'Новости', 'url' => ['/site/news']
          ],
          [
            'label' => 'Тренажеры', 'url' => ['/site/trainer']
          ],
          [
            'label' => 'Фотографии', 'url' => ['/site/photo']
          ],
          [
            'label' => 'Видеозаписи', 'url' => ['/site/video']
          ],
          [
            'label' => 'Live-трансляция', 'url' => ['/site/live']
          ]
        ],
        ];
        $items[] = ['label' => 'ТРЕНИРОВКИ', 'items' => [
          [
            'label' => 'Тренировки', 'url' => ['/site/training']
          ],
          [
            'label' => 'Акции и предложения', 'url' => ['/site/stock']
          ]
        ],
        ];
        $items[] = ['label' => 'СТАТЬИ', 'url' => ['/site/article']];
        $items[] = ['label' => 'КОНТАКТЫ', 'url' => ['/site/contact']];
        if(Yii::$app->user->isGuest):
          $items[]=['label' => 'ВОЙТИ', 'url' => ['/auth/login']];

        else:
          $items[]=['label' => Yii::$app->user->identity->firstName, 'url' => ['/auth/room']];
          $items[]='<li>'
          . Html::beginForm(['/auth/logout'], 'post')
          . Html::submitButton(
              'ВЫХОД',
              ['class' => 'btn logout-scroll logout']
          )
          . Html::endForm()
          . '</li>';
        endif;

        echo Nav::widget([
            'activateParents' => true,
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $items]
          );
        NavBar::end();
      ?>
  </header>

  <div class="container">
      <?= $content ?>
  </div>
</div>

<footer>
  <div class="container-fluid">
    <div class="row sniper">
      <div class="col-lg-4 col-lg-4 col-md-4">
        <h3>
          <img class='lazy' data-original="/images/backgrounds/logo.png" alt="logo"/>
          <span class="color-green">SNIPER</span>
        </h3>
        <p>Хоккейный центр Sniper</p>
        <p>
          <i class="fa fa-map-marker" aria-hidden="true"></i>
          &ensp;<?= Html::encode($this->params['address']) ?>
        </p>
        <p>
          <i class="fa fa-phone" aria-hidden="true"></i>
          &ensp;<?= Html::encode($this->params['phone']) ?>
        </p>
        <p>
          <i class="fa fa-envelope-o" aria-hidden="true"></i>
          &ensp;<?= Html::encode($this->params['email']) ?>
        </p>
      </div>
      <div class="col-lg-4 col-lg-4 col-md-4">
        <h3 class="footer-h">
          <span>Социальные сети</span>
        </h3>
        <hr/>
        <a href="<?= Html::encode($this->params['vk']) ?>" target="_blank"><p>Вконтаке</p></a>
        <a href="<?= Html::encode($this->params['instagram']) ?>" target="_blank"><p>Instagram</p></a>
        <a href="<?= Html::encode($this->params['youtube']) ?>" target="_blank"><p>Youtube</p></a>
        <a class="stroke" href="<?=Yii::$app->urlManager->createUrl('site/contact')?>" title="">Свяжитесь с нами</a>
      </div>
      <div class="col-lg-4 col-lg-4 col-md-4">
        <h3 class="footer-h">
          <span>Карта сайта</span>
        </h3>
        <hr/>
        <div class="row site-map">
          <div class="col-lg-6 col-lg-6 col-md-6 copy-left">
            <a href="<?=Yii::$app->urlManager->createUrl('site/index')?>"><p>Главная</p></a>
            <a href="<?=Yii::$app->urlManager->createUrl('site/news')?>"><p>Новости</p></a>
            <a href="<?=Yii::$app->urlManager->createUrl('site/process')?>"><p>Тренировки</p></a>
          </div>
          <div class="col-lg-6 col-lg-6 col-md-6 copy-right">
            <a href="<?=Yii::$app->urlManager->createUrl('site/about')?>"><p>О нас</p></a>
            <a href="<?=Yii::$app->urlManager->createUrl('site/article')?>"><p>Статьи</p></a>
            <a href="<?=Yii::$app->urlManager->createUrl('site/contact')?>"><p>Контакты</p></a>
          </div>
        </div>
        <a class="stroke" href="<?=Yii::$app->urlManager->createUrl('site/training')?>" title="">Записаться на тренировку</a>
      </div>
    </div>

      <div class="row copy">
        <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6 copy-left">
          <p>&copy; Хоккейный центр Sniper <?= date('Y') ?></p>
        </div>
        <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6 copy-right">
          <p class="dev">
            Сайт разработан <span class="color-green">Evgeny Popkov</span>
            <a href="//vk.com/evgenypopkov" target="_blank"><img class='lazy' data-original="/images/backgrounds/vk.png" alt="vk"></a>
          </p>
        </div>
      </div>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
