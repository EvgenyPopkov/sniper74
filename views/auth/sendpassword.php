<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Восстановление пароля - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/login.css', ['depends' => ['app\assets\AppAsset']], 'login');
?>
<div class="auth-login sendpassword">

  <div class="auth-login-form">
    <h1 class="rep-pass">Восстановление пароля</h1>
    <hr/>
    <p>Ваш адрес электронной почты</p>

    <?php $form = ActiveForm::begin([
        'id' => 'sendpassword-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "<div class=\"auth-login-input\">{input}</div>\n<div class=\"auth-login-error\">{error}</div>",
        ],
    ]); ?>

        <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'placeholder' => 'Email']) ?>

        <div class="form-group">
            <?= Html::submitButton('Восстановить пароль', ['class' => 'btn btn-primary', 'name' => 'sendpassword-button']) ?>
        </div>

    <?php ActiveForm::end(); ?>
  </div>

</div>
