<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->dropDownList([0 => 0, 1 => 1], ['class'=>'form-control']) ?>

    <div class="form-group">
        <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
