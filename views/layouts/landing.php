<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\LandingAsset;

LandingAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link href="https://fonts.googleapis.com/css?family=Neucha|Roboto&amp;subset=cyrillic" rel="stylesheet">
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

<div class="wrap">

  <div class="market-landing">

      <header>
          <?php
            NavBar::begin([
                'brandLabel' => Html::img('@web/images/logo.png', ['alt'=>Yii::$app->name]),
                'brandUrl' => ['/site/index'],
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top navbar-noscroll',
                ],
            ]);
          ?>

          <?php
            $items[] = ['label' => 'ГЛАВНАЯ', 'url' => ['/site/index'], 'id' => 'l'];
            $items[] = ['label' => 'О НАС', 'url' => ['/pages/about'], 'id' => 'l'];
            $items[] = ['label' => 'КОНТАКТЫ', 'url' => ['/pages/contact']];

            if(Yii::$app->user->isGuest){
              $items[]=['label' => 'ВОЙТИ', 'url' => ['/pages/login']];
            }
            else{
              $items[]=['label' => Yii::$app->user->identity->username, 'url' => ['/pages/logout']];
              $items[]='<li>'
              . Html::beginForm(['/pages/logout'], 'post')
              . Html::submitButton(
                  'ВЫХОД',
                  ['class' => 'btn logout-noscroll logout']
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

      <div class="landing-info">
        <h5>Добро пожаловать</h5>
        <h5>В центр подготовки хоккеистов <span class="color-green">Sniper</span></h5><br/>
        <h1><span>Мы подготавливаем хоккеистов</span></h1>
        <h1><span class="color-green">любого</span> возраста и уровня подготовки</h1>
        <a class="stroke" href="/pages/contact" title="">Свяжитесь с нами</a>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-4">
          <i class="fa fa-phone fa-4x" aria-hidden="true"></i>
          <phone>&emsp;+7 (919) 336-44-63</phone>
        </div>
        <div class="col-lg-4 col-md-4">
          <a href="/pages/contact"><button class="btn">Записаться на тренировку</button></a>
        </div>
        <div class="col-lg-4 col-md-4 social">
          <a href="https://vk.com/sniper174" target="_blank">
            <img src="/images/vk.png" alt="vk"/>
          </a>
          <b>&emsp;</b>
          <a href="https://www.instagram.com/sniper.ru" target="_blank">
            <img src="/images/instagram.png" alt="instagram"/>
          </a>
          <b>&emsp;</b>
          <a href="/pages/contact"><i class="fa fa-envelope-o fa-4x" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>

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
            <img src="/images/logo.png" alt="logo"/>
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
          <a class="stroke" href="/pages/contact" title="">Напишите нам</a>
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
              <a href="https://vk.com/evgenypopkov" target="_blank"><img src="/images/vk.png" alt="vk"></a>
            </p>
          </div>
        </div>
        </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
