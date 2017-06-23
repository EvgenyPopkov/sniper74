<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;

AdminAsset::register($this);
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
        'brandLabel' => 'Sniper',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Центр', 'items' => [
              [
                'label' => 'Главная',   'url' => ['/admin/index/view'],
              ],
              [
                'label' => 'О нас',   'url' => ['/admin/about/view'],
              ],
              [
                'label' => 'Контакты',   'url' => ['/admin/contact/view'],
              ],
              [
                'label' => 'Новости',   'url' => ['/admin/news/index'],
              ],
              [
                'label' => 'Тренера',   'url' => ['/admin/coach/index'],
              ],
              [
                'label' => 'Тренажеры',   'url' => ['/admin/trainer/index'],
              ],
              [
                'label' => 'Фотографии',   'url' => ['/admin/photo/index'],
              ],
              [
                'label' => 'Видеозаписи',   'url' => ['/admin/video/index'],
              ],
              [
                'label' => 'Адреса',   'url' => ['/admin/address/index'],
              ],
              [
                'label' => 'Акции',   'url' => ['/admin/stock/index'],
              ]
            ]],
            ['label' => 'Cтатьи', 'items' => [
              [
                'label' => 'Cтатьи',   'url' => ['/admin/article/index'],
              ],
              [
                'label' => 'Категории',   'url' => ['/admin/category/index'],
              ],
              [
                'label' => 'Комментарии',   'url' => ['/admin/comment/index'],
              ]
            ]],
            ['label' => 'Тренировочный процесс', 'items' => [
              [
                'label' => 'Сборы',   'url' => ['/admin/sbor/index'],
              ],
              [
                'label' => 'Упражнения',   'url' => ['/admin/task/index'],
              ],
              [
                'label' => 'Программы',   'url' => ['/admin/program/index'],
              ],
              [
                'label' => 'Программы-Упражнения',   'url' => ['/admin/taskprogram/index'],
              ],
              [
                'label' => 'Тренировка',   'url' => ['/admin/training/index'],
              ],
              [
                'label' => 'Время тренировки',   'url' => ['/admin/timetraining/index'],
              ],
            ]],
            ['label' => 'Пользователи', 'items' => [
              [
                'label' => 'Незарегистрированные',   'url' => ['/admin/registerwait/index'],
              ],
              [
                'label' => 'Зарегистрированные',   'url' => ['/admin/user/index'],
              ],
              [
                'label' => 'Подписчики',   'url' => ['/admin/subscribe/index'],
              ],
              [
                'label' => 'Записанные на тренировки',   'url' => ['/admin/entry/index'],
              ],
              [
                'label' => 'Записанные на сборы',   'url' => ['/admin/entrysbor/index'],
              ],
            ]],
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
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
