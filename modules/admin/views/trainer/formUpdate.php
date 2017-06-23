<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="sbor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php if ($model->image !== null):?>
      <?= Html::a('Изменить картинку', ['image', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
      <?= Html::a('Удалить картинку', ['imagedel', 'id' => $model->id], ['class' => 'btn btn-danger'])?>
    <?php else: ?>
      <?= Html::a('Добавить картинку', ['image', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    <?php endif?>

    <?= $form->field($model, 'priority')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
