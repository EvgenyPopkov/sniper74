<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="article-form">

    <?php $form = ActiveForm::begin();?>

    <?= $form->field($model,'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'vk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'instagram')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'youtube')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
