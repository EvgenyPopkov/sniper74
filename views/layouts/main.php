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
                  'class' => 'navbar-scroll navbar-inverse navbar-fixed-top',
              ],
          ]);
          ?>
          <?php
          echo Nav::widget([
              'options' => ['class' => 'navbar-nav navbar-right'],
              'items' => [
                  ['label' => 'ГЛАВНАЯ', 'url' => ['/site/index']],
                  ['label' => 'О НАС', 'url' => ['/pages/about'], 'id' => 'l'],
                  ['label' => 'КОНТАКТЫ', 'url' => ['/pages/contact']],
                  Yii::$app->user->isGuest ? (
                    ['label' => 'ВОЙТИ', 'url' => ['/pages/login']]
                  ) : (
                      '<li>'
                      . Html::beginForm(['/pages/logout'], 'post')
                      . Html::submitButton(
                          'Logout (' . Yii::$app->user->identity->username . ')',
                          ['class' => 'btn btn-link logout logout-noscroll']
                      )
                      . Html::endForm()
                      . '</li>'
                  )
              ],
          ]);
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

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
