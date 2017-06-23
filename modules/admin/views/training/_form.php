<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="training-form">

    <?php $form = ActiveForm::begin(); ?>

    <label class="control-label">Тип тренировки</label>
    <?= Html::dropDownList('type', 1, $types, ['class'=>'form-control']) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'day')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
