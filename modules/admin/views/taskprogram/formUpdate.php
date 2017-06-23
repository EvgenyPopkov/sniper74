<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="article-form">

    <?php $form = ActiveForm::begin();?>

    <label class="control-label">Программа</label>
    <?= Html::dropDownList('program', $programId, $programs, ['class'=>'form-control']) ?>

    <label class="control-label">Упражнение</label>
    <?= Html::dropDownList('task', $taskId, $tasks, ['class'=>'form-control']) ?>

    <div class="form-group">
        <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
