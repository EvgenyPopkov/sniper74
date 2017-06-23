<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="task-program-form">

    <?php $form = ActiveForm::begin(); ?>

    <label class="control-label">Программа</label>
    <?= Html::dropDownList('program', 1, $programs, ['class'=>'form-control']) ?>

    <label class="control-label">Упражнение</label>
    <?= Html::dropDownList('task', 1, $tasks, ['class'=>'form-control']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
