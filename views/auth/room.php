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

    <div class="col-lg-3 col-md-3 repair-pass">
      <?php if(Yii::$app->session->getFlash('phone')):?>
              <div class="alert alert-success">
                  <?= Yii::$app->session->getFlash('phone'); ?>
              </div>
      <?php endif;?>

      <h2>Номер телефон</h2>
      <hr>

      <h5>Ваш номер телефона:</h5>
      <h4><?=Yii::$app->user->identity->phone?></h4>

      <?php $form = ActiveForm::begin([
          'id' => 'login-form',
          'layout' => 'horizontal',
          'fieldConfig' => [
              'template' => "<div class=\"auth-login-input\">{input}</div>\n<div class=\"auth-login-error\">{error}</div>",
          ],
      ]); ?>
      <?= $form->field($phone, 'phone')->textInput(['placeholder' => 'Номер телефона']) ?>

      <div class="form-group">
          <?= Html::submitButton('Изменить номер', ['class' => 'btn btn-success']) ?>
      </div>

      <?php ActiveForm::end(); ?>

      <?php if(Yii::$app->session->getFlash('repair')):?>
              <div class="alert alert-success">
                  <?= Yii::$app->session->getFlash('repair'); ?>
              </div>
      <?php endif;?>

      <h2>Изменение пароля</h2>
      <hr>
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


    <?php if (!Yii::$app->user->identity->isAdmin): ?>
      <div class="col-lg-9 col-md-9 room-entry">
        <?php if(Yii::$app->session->getFlash('room')):?>
                <div class="alert alert-success entry-flash">
                    <?= Yii::$app->session->getFlash('room'); ?>
                </div>
        <?php endif;?>
        <?php if(Yii::$app->session->getFlash('roomsbor')):?>
                <div class="alert alert-success entry-flash">
                    <?= Yii::$app->session->getFlash('roomsbor'); ?>
                </div>
        <?php endif;?>
        <?php if(Yii::$app->session->getFlash('entrydelete')):?>
                <div class="alert alert-success entry-flash">
                    <?= Yii::$app->session->getFlash('entrydelete'); ?>
                </div>
        <?php endif;?>
        <?php if(Yii::$app->session->getFlash('entrysbordelete')):?>
                <div class="alert alert-success entry-flash">
                    <?= Yii::$app->session->getFlash('entrysbordelete'); ?>
                </div>
        <?php endif;?>

        <h2>Тренировки, на которые вы записались</h2>
        <hr>
        <table class="table table-hover table-bordered">
          <tr class="success tab-head">
              <td>День недели</td>
              <td>Дата</td>
              <td>Время</td>
              <td>Описание</td>
              <td>Цена, руб</td>
              <td>Адрес</td>
              <td>Отмена</td>
          </tr>
          <?php function getDateName($value){
            switch ($value) {
                case 1:
                    return "Понедельник";
                    break;
                case 2:
                    return "Вторник";
                    break;
                case 3:
                    return "Среда";
                    break;
                case 4:
                    return "Четверг";
                    break;
                case 5:
                    return "Пятница";
                    break;
                case 6:
                    return "Суббота";
                    break;
                case 7:
                    return "Воскресенье";
                    break;
            }
          } ?>

          <?php foreach (Yii::$app->user->identity->entrys as $entry) {?>
            <tr>
              <td><?= Html::encode(getDateName($entry->time->training->day))?></td>
              <td><?= Html::encode($entry->date)?></td>
              <td><?= Html::encode($entry->time->begin)?> - <?= Html::encode($entry->time->end)?></td>
              <td><?= Html::encode($entry->time->training->description)?></td>
              <td><?= Html::encode($entry->time->training->price)?></td>
              <td><?= Html::encode($entry->time->address->address)?>, <?= Html::encode($entry->time->address->description)?></td>
              <td><a href="<?=Url::toRoute(['auth/cancel','id'=> $entry->id])?>"><button class="btn btn-danger">Отменить</button></a></td>
            </tr>
          <?php } ?>
        </table>

        <?php if (count(Yii::$app->user->identity->sbores) > 0) :?>

          <h2>Сборы</h2>
          <hr>
          <table class="table table-hover table-bordered">
            <tr class="success tab-head">
                <td>Дата</td>
                <td>Название</td>
                <td>Цена, руб</td>
                <td>Отмена</td>
            </tr>

            <?php foreach (Yii::$app->user->identity->sbores as $sbor) {?>
              <tr>
                <td><?= $sbor->sbor->dateBegin?> - <?= $sbor->sbor->dateEnd?></td>
                <td><?= $sbor->sbor->head?></td>
                <td><?= $sbor->sbor->price?></td>
                <td><a href="<?=Url::toRoute(['auth/cancelsbor','id'=> $sbor->id])?>"><button class="btn btn-danger">Отменить</button></a></td>
              </tr>
            <?php } ?>
          </table>
        <?php endif; ?>

      </div>
    <?php else : ?>
      <div class="col-lg-9 col-md-9 room-admin">
        <a href="<?=Url::toRoute(['admin/'])?>">Панель администатора</a>
      </div>
    <?php endif; ?>

  </div>
</div>
