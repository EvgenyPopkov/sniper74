<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="time-training-form">

    <?php $form = ActiveForm::begin(); ?>

    <label class="control-label">Тренировка</label>
    <?= Html::dropDownList('training', 1, $trainings, ['class'=>'form-control']) ?>

    <label class="control-label">Адрес</label>
    <?= Html::dropDownList('address', 1, $addresses, ['class'=>'form-control']) ?>

    <?= $form->field($model, 'begin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'end')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Создать' , ['class' => 'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
