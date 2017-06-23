<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <label class="control-label">Тренировка</label>
    <?= Html::dropDownList('training', $trainingId, $trainings, ['class'=>'form-control']) ?>

    <label class="control-label">Адрес</label>
    <?= Html::dropDownList('address', $addressId, $addresses, ['class'=>'form-control']) ?>

    <?= $form->field($model, 'begin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'end')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
