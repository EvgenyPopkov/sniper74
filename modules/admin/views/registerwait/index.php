<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Незарегистрированные';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="register-wait-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(!empty($registers)):?>

        <table class="table table-bordered table-hover">
            <thead>
                <tr class="success tab-head">
                    <td>Email</td>
                    <td>Дата</td>
                    <td>Удаление</td>
                </tr>
            </thead>

            <tbody>
                <?php foreach($registers as $register):?>
                    <tr>
                        <td><?= $register->email?></td>
                        <td><?= $register->date?></td>
                        <td>
                          <?= Html::a('Удалить', ['delete', 'id' => $register->id], [
                              'class' => 'btn btn-danger',
                              'data' => [
                                  'confirm' => 'Вы действительно хотите удалить?',
                                  'method' => 'post',
                              ],
                          ]) ?>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>

    <?php endif;?>
</div>
