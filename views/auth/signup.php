<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/login.css', ['depends' => ['app\assets\AppAsset']], 'login');
?>
<div class="auth-login auth-signup">

  <div class="auth-login-form">
    <h1>Регистрация</h1>
    <hr/>
    <p>Заполните поля для регистрации</p>

    <?php $form = ActiveForm::begin([
        'id' => 'signup-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "<div class=\"auth-login-input\">{input}</div>\n<div class=\"auth-login-error\">{error}</div>",
        ],
    ]); ?>

        <?= $form->field($model, 'firstName')->textInput(['placeholder' => 'Имя']) ?>
        <?= $form->field($model, 'lastName')->textInput(['placeholder' => 'Фамилия']) ?>
        <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Номер телефона']) ?>
        <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'placeholder' => 'Email']) ?>
        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль не менее 5 символов']) ?>
        <?= $form->field($model, 'confirmPassword')->passwordInput(['placeholder' => 'Подтвердите пароль']) ?>

        <div class="form-group">
            <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>

    <?php ActiveForm::end(); ?>
  </div>

</div>
