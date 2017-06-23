<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="address-form">

    <?php $form = ActiveForm::begin(); ?>

    <label class="control-label">Тэг адреса</label>
    <?= Html::dropDownList('tag', 1, $tags, ['class'=>'form-control']) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'width')->textInput() ?>

    <?= $form->field($model, 'height')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' =>'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
