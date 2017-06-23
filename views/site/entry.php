<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Запись - Sniper Хоккейный центр';
$this->registerCssFile('@web/calendar/jquery-ui.min.css', ['depends' => ['app\assets\AppAsset']]);
$this->registerCssFile('@web/css/entry.css', ['depends' => ['app\assets\AppAsset']]);
$this->registerJsFile('@web/calendar/jquery-ui.min.js', ['depends' => ['app\assets\AppAsset']]);
$this->registerJsFile('@web/js/calendar.js', ['depends' => ['app\assets\AppAsset']]);
?>

<div class="site-entry">
  <div class=" entry-block">
    <h1>Запись на тренировку</h1>
  </div>
  <div class="entry">
    <?php $form = ActiveForm::begin([
          'id' => 'signup-form',
          'layout' => 'horizontal',
          'fieldConfig' => [
              'template' => "<div>{input}</div>\n<div>{error}</div>",
          ],
        ]); ?>

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

        <div class="entry-training">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 entry-left">
                <b>Тренировка:&emsp;</b>
                <b>Время:&emsp;</b>
                <b>День недели:&emsp;</b>
                <b>Цена:&emsp;</b>
                <b>Адрес:&emsp;</b>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 entry-right">
                <label class="control-label"><?= Html::encode($time->training->description)?></label>
                <label class="control-label"><?= Html::encode($time->begin)?> - <?= Html::encode($time->end)?></label>
                <label class="control-label"><?= Html::encode(getDateName($time->training->day))?></label>
                <label class="control-label"><?= Html::encode($time->training->price)?> руб</label>
                <label class="control-label"><?= Html::encode($time->address->address)?>,</label>
                <label class="control-label"><?= Html::encode($time->address->description)?></label>
              </div>
            </div>
        </div>

        <hr>

        <?php if(Yii::$app->session->getFlash('equals')):?>
                <div class="alert alert-danger equals">
                    <?= Yii::$app->session->getFlash('equals'); ?>
                </div>
        <?php endif;?>

        <div class="entry-record">
          <p>Выберите дату</p>
          <span>Дата не должна превышать 30 дней от текущей даты</span>
          <?= $form->field($model, 'date')->textInput(['class' => 'datepicker', 'placeholder' => 'Дата', 'readonly' => true]) ?>
          <div class="form-group">
              <?= Html::submitButton('Записаться', ['class' => 'btn btn-primary']) ?>
          </div>
        </div>

    <?php ActiveForm::end(); ?>

  </div>
</div>
