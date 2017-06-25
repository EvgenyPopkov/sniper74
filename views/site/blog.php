<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Статья - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/blog.css', ['depends' => ['app\assets\AppAsset']]);
?>

<div class="site-blog">
  <div class="blog">
  <h3><?= $article->category->name ?></h3>
  <h1><?= $article->title ?></h1>
  <hr>
  <p class="desc">
    <?= $article->description ?>
  </p>
  <img class='lazy' data-original="/images/articles/<?=$article->image ?>" alt="">
  <div class="cont">
    <?= $article->content ?>
  </div>
  <?php if ($article->video !== '') {?>
    <iframe src="<?= $article->video ?>" frameborder="0" allowfullscreen></iframe>
  <?php } ?>
  </div>

  <?php if(count($comments) > 0):?>
    <h2>Комментарии</h2>
    <?php foreach($comments as $comment) { ?>
      <div class="comment">
        <h2><?= Html::encode($comment->user->firstName) ?></h2>
        <h4><?= Html::encode($comment->date) ?></h4>
        <p><?= Html::encode($comment->text) ?></p>
      </div>
    <?php } ?>
    <?php
        echo LinkPager::widget([
            'pagination' => $pagination,
        ]);
    ?>
  <?php endif ?>

  <h2>Добавить комментарий</h2>
  <?php if(Yii::$app->user->isGuest):?>
    <div class="alert alert-danger">
      <a class="danger" href="<?= Url::toRoute(['auth/login']);?>"><p>Комментарии могут оставлять только авторизованные пользователи</p></a>
    </div>
  <?php else : ?>
    <?php if(Yii::$app->session->getFlash('comment')):?>
            <div class="alert alert-success">
                <?= Yii::$app->session->getFlash('comment'); ?>
            </div>
    <?php endif;?>
    <?php $form = \yii\widgets\ActiveForm::begin([
            'action'=>['site/comment', 'id'=>$article->id],
            'options'=>['class'=>'form-horizontal contact-form', 'role'=>'form']])?>
        <div class="form-group">
            <div class="col-md-12">
                <?= $form->field($commentForm, 'comment')->textarea(['class'=>'form-control','placeholder'=>'Комментарий'])->label(false)?>
            </div>
        </div>
        <button type="submit" class="btn send-btn btn-com">Добавить комментарий</button>
        <?php \yii\widgets\ActiveForm::end();?>
  <?php endif ?>
</div>
