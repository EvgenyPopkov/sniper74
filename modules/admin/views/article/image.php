<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('Изменить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
