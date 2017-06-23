<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Регистрация - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/login.css', ['depends' => ['app\assets\AppAsset']], 'login');
?>
<div class="auth-login">
  <?php if(Yii::$app->session->getFlash('register-sendmail')):?>
          <div class="alert alert-success register-session">
              <?= Yii::$app->session->getFlash('register-sendmail'); ?>
          </div>
  <?php else:?>


    <div class="auth-login-form">
      <h1 class="reg-mail">Регистрация</h1>

      <?php $form = ActiveForm::begin([
          'id' => 'signup-form',
          'layout' => 'horizontal',
          'fieldConfig' => [
              'template' => "<div class=\"auth-login-input\">{input}</div>\n<div class=\"auth-login-error\">{error}</div>",
          ],
      ]); ?>

          <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'placeholder' => 'Email']) ?>

          <p class="reg-verify">Введите код с картинки <br>
          Если тект не понятен, нажмите на картинку</p>

          <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
              'template' => '<div><div>{image}</div><br><div class="verify">{input}</div></div>',
          ])?>

          <div class="form-group">
              <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
          </div>

      <?php ActiveForm::end(); ?>
    </div>

  <?php endif;?>
</div>

<script type="text/javascript">
  document.getElementById("registerform-verifycode").setAttribute("placeholder", "Код");
</script>
