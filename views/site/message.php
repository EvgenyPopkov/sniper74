<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Сообщение - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/message.css', ['depends' => ['app\assets\AppAsset']]);
?>
<div class="site-message">

    <div class="message-form">
      <h1>Сообщение</h1>
      <hr>

      <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
        <div class="alert alert-success">
            Сообщение отправлено
        </div>

      <?php else: ?>
        <p>Заполните поля и отправьте нам сообщениие</p>
        <div>
          <?php $form = ActiveForm::begin([
            'id' => 'contact-form',
            'fieldConfig' => [
                'template' => "<div class=\"message-input\">{input}</div>\n<div class=\"message-error\">{error}</div>",
            ],
          ]); ?>

          <?php if(Yii::$app->user->isGuest):?>
                  <?=$form->field($model, 'name')->textInput(['autofocus' => true, 'placeholder' => 'Ваше имя'])?>
                  <?=$form->field($model, 'email') ->textInput(['placeholder' => 'Ваш email'])?>

          <?php else :?>
                  <?=$form->field($model, 'name')->textInput(['autofocus' => true, 'value' => Yii::$app->user->identity->firstName, 'disabled' => true])?>
                  <?=$form->field($model, 'email') ->textInput(['value' => Yii::$app->user->identity->email, 'disabled' => true])?>

          <?php endif;?>

          <?= $form->field($model, 'subject') ->textInput(['placeholder' => 'Тема сообщения'])?>

          <?= $form->field($model, 'body')->textarea(['rows' => 6, 'placeholder' => 'Текст сообщения']) ?>

          <p>Введите код с картинки</p>

          <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
              'template' => '<div><div>{image}</div><br><div class="verify">{input}</div></div>',
          ])?>

          <div class="form-group">
              <?= Html::submitButton('Отправить сообщение', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
          </div>

          <?php ActiveForm::end(); ?>
        </div>
      <?php endif; ?>

    </div>
</div>
