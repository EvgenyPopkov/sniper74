<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="article-form">

    <?php $form = ActiveForm::begin();?>

    <?= $form->field($model,'we')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model,'training')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model,'footer')->textarea(['maxlength' => true]) ?>
    
    <?= $form->field($model,'gym')->textarea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
