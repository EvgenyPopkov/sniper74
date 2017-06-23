<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/login.css', ['depends' => ['app\assets\AppAsset']],'login');
?>
<div class="auth-login">
  <div class="auth-login-form">
    <?php if(Yii::$app->session->getFlash('repair')):?>
            <div class="alert alert-success repair-session">
                <?= Yii::$app->session->getFlash('repair'); ?>
            </div>
    <?php endif;?>
    <h1>Вход</h1>
    <p>Введите email и пароль</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "<div class=\"auth-login-input\">{input}</div>\n<div class=\"auth-login-error\">{error}</div>",
        ],
    ]); ?>

        <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'placeholder' => 'Email']) ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль']) ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' =>
            "<div class=\"remember-left\">Запомнить меня&emsp;{input}&emsp;&emsp;
              <a href='sendpassword'>Забыли пароль?</a>
            </div>\n
            <div>{error}</div>",
        ]) ?>

        <div class="row btn-login">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-5 btn-left">
            <?= Html::submitButton('Войти', ['class' => 'btn', 'name' => 'login-button']) ?>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-7 btn-right">
            <a href='<?=Url::toRoute(['auth/register'])?>'>
              <button type="button" name="reg-button" class="btn">Регистрация</button>
            </a>
          </div>
        </div>

    <?php ActiveForm::end(); ?>
  </div>

</div>
