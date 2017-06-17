<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <label class="control-label">Категория</label>
    <?= Html::dropDownList('category', 1, $categories, ['class'=>'form-control']) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($image, 'image')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'video')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
