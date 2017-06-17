<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="article-form">

    <?php $form = ActiveForm::begin();?>

    <?= $form->field($model,'we')->textarea(['maxlength' => true]) ?>
    <div class="form-group">
      <label class="control-label">Картинка бросок</label>
      <?= Html::a('Изменить картинку', ['imageshot'], ['class' => 'btn btn-success']) ?>
    </div>
    <div class="form-group">
      <label class="control-label">Картинка катание</label>
      <?= Html::a('Изменить картинку', ['imagescating'], ['class' => 'btn btn-success']) ?>
    </div>
    <div class="form-group">
      <label class="control-label">Картинка дриблинг</label>
      <?= Html::a('Изменить картинку', ['imagedribbling'], ['class' => 'btn btn-success']) ?>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
