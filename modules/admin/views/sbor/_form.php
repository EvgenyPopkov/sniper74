<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->registerCssFile('@web/calendar/jquery-ui.min.css', ['depends' => ['app\assets\AdminAsset']]);
$this->registerJsFile('@web/calendar/jquery-ui.min.js', ['depends' => ['app\assets\AdminAsset']]);
$this->registerJsFile('@web/js/calendar.js', ['depends' => ['app\assets\AdminAsset']]);

?>

<div class="sbor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dateBegin')->textInput(['class' => 'datepicker']) ?>

    <?= $form->field($model, 'dateEnd')->textInput(['class' => 'datepicker']) ?>

    <?= $form->field($model, 'head')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'priority')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Cоздать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
