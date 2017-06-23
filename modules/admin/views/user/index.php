<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Зарегистрированные';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(!empty($users)):?>

        <table class="table table-bordered table-hover">
            <thead>
                <tr class="success tab-head">
                    <td>Имя</td>
                    <td>Фамилия</td>
                    <td>Email</td>
                    <td>Телефон</td>
                    <td>Дата регистрации</td>
                    <td>Статус</td>
                </tr>
            </thead>

            <tbody>
                <?php foreach($users as $user):?>
                    <tr>
                        <td><?= $user->firstName?></td>
                        <td><?= $user->lastName?></td>
                        <td><?= $user->email?></td>
                        <td><?= $user->phone?></td>
                        <td><?= $user->dateRegister?></td>
                        <td>
                          <?php if($user->isAllowed()):?>
                              <a class="btn btn-warning" href="<?= Url::toRoute(['user/disallow', 'id'=>$user->id]);?>">Убрать права администратора</a>
                          <?php else:?>
                              <a class="btn btn-success" href="<?= Url::toRoute(['user/allow', 'id'=>$user->id]);?>">Дать права администратора</a>
                          <?php endif?>
                          <?= Html::a('Удалить', ['delete', 'id' => $user->id], [
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
