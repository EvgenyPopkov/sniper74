<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Комментарии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(!empty($comments)):?>

        <table class="table table-bordered table-hover">
            <thead>
                <tr class="success tab-head">
                    <td>Статья</td>
                    <td>Пользователь</td>
                    <td>Текст</td>
                    <td>Дата</td>
                    <td>Статус</td>
                </tr>
            </thead>

            <tbody>
                <?php foreach($comments as $comment):?>
                    <tr>
                        <td><?= $comment->article->title?></td>
                        <td><?= $comment->user->email?></td>
                        <td><?= $comment->text?></td>
                        <td><?= $comment->date?></td>
                        <td>
                          <?php if($comment->isAllowed()):?>
                              <a class="btn btn-warning" href="<?= Url::toRoute(['comment/disallow', 'id'=>$comment->id]);?>">Скрыть</a>
                          <?php else:?>
                              <a class="btn btn-success" href="<?= Url::toRoute(['comment/allow', 'id'=>$comment->id]);?>">Отобразить</a>
                          <?php endif?>
                          <?= Html::a('Удалить', ['delete', 'id' => $comment->id], [
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
