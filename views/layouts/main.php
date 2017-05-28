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
    <link href="https://fonts.googleapis.com/css?family=Neucha|Roboto&amp;subset=cyrillic" rel="stylesheet">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

  <header>
      <?php
        NavBar::begin([
            'brandLabel' => Html::img('@web/images/logo.png', ['alt'=>Yii::$app->name]),
            'brandUrl' => ['/site/index'],
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top navbar-scroll',
            ],
        ]);
      ?>

      <?php
        $items[] = ['label' => 'ГЛАВНАЯ', 'url' => ['/site/index'], 'id' => 'l'];
        $items[] = ['label' => 'О НАС', 'url' => ['/site/about'], 'id' => 'l'];
        $items[] = ['label' => 'КОНТАКТЫ', 'url' => ['/pages/contact']];

        if(Yii::$app->user->isGuest){
          $items[]=['label' => 'ВОЙТИ', 'url' => ['/auth/login']];
        }
        else{
          $items[]=['label' => Yii::$app->user->identity->email, 'url' => ['/auth/logout']];
          $items[]='<li>'
          . Html::beginForm(['/auth/logout'], 'post')
          . Html::submitButton(
              'ВЫХОД',
              ['class' => 'btn logout-scroll logout']
          )
          . Html::endForm()
          . '</li>';
        }

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $items]
          );
        NavBar::end();
      ?>
  </header>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer>
  <div class="container-fluid">
    <div class="row sniper">
      <div class="col-lg-4 col-lg-4 col-md-4">
        <h3>
          <img class='lazy' data-original="/images/logo.png" alt="logo"/>
          <span class="color-green">SNIPER</span>
        </h3>
        <p>Хоккейный центр Sniper</p>
        <p>
          <i class="fa fa-map-marker" aria-hidden="true"></i>
          &ensp;г.Челябинск ул.Новороссийская д.8
        </p>
        <p>
          <i class="fa fa-phone" aria-hidden="true"></i>
          &ensp;+7 (919) 336-44-63
        </p>
        <p>
          <i class="fa fa-envelope-o" aria-hidden="true"></i>
          &ensp;popkovsignal18@mail.ru
        </p>
      </div>
      <div class="col-lg-4 col-lg-4 col-md-4">
        <h3 class="footer-h">
          <span>Социальные сети</span>
        </h3>
        <hr/>
        <a href="https://vk.com/sniper174" target="_blank"><p>Вконтаке</p></a>
        <a href="https://www.instagram.com/sniper.ru" target="_blank"><p>Instagram</p></a>
        <a href="https://www.instagram.com/sniper.ru" target="_blank"><p>Youtube</p></a>
        <a class="stroke" href="<?=Yii::$app->urlManager->createUrl('pages/contact')?>" title="">Напишите нам</a>
      </div>
      <div class="col-lg-4 col-lg-4 col-md-4">
        <h3 class="footer-h">
          <span>Карта сайта</span>
        </h3>
        <hr/>
        <div class="row site-map">
          <div class="col-lg-6 col-lg-6 col-md-6 copy-left">
            <a href="/site/index"><p>Главная</p></a>
            <a href="/site/index"><p>Главная</p></a>
            <a href="/site/index"><p>Главная</p></a>
          </div>
          <div class="col-lg-6 col-lg-6 col-md-6 copy-right">
            <a href="/site/index"><p>Главная</p></a>
            <a href="/site/index"><p>Главная</p></a>
            <a href="/site/index"><p>Главная</p></a>
          </div>
        </div>
        <a class="stroke" href="/pages/contact" title="">Записаться на тренировку</a>
      </div>
    </div>

      <div class="row copy">
        <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6 copy-left">
          <p>&copy; Хоккейный центр Sniper <?= date('Y') ?></p>
        </div>
        <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6 copy-right">
          <p class="dev">
            Сайт разработан <span class="color-green">Evgeny Popkov</span>
            <a href="https://vk.com/evgenypopkov" target="_blank"><img class='lazy' data-original="/images/vk.png" alt="vk"></a>
          </p>
        </div>
      </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
