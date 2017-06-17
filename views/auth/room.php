<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Личный кабинет - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/room.css', ['depends' => ['app\assets\AppAsset']]);
?>

<div class="site-room">
  <div class="room-block">
    <h1>Личный кабинет <?=Yii::$app->user->identity->email?></h1>
  </div>
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
      <?php $form = ActiveForm::begin([
          'id' => 'login-form',
          'layout' => 'horizontal',
          'fieldConfig' => [
              'template' => "<div class=\"auth-login-input\">{input}</div>\n<div class=\"auth-login-error\">{error}</div>",
          ],
      ]); ?>
      <?= $form->field($model, 'old')->passwordInput(['placeholder' => 'Текущий пароль']) ?>

      <?= $form->field($model, 'new')->passwordInput(['placeholder' => 'Новый пароль']) ?>

      <?= $form->field($model, 'confirm')->passwordInput(['placeholder' => 'Подтвердите пароль']) ?>

      <div class="form-group">
          <?= Html::submitButton('Изменить пароль', ['class' => 'btn btn-success']) ?>
      </div>

      <?php ActiveForm::end(); ?>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">

    </div>
  </div>
</div>
