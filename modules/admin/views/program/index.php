<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

$this->title = 'Программы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <table class="table table-bordered table-hover">
      <thead>
          <tr class="success tab-head">
              <td>Название</td>
              <td>Описание</td>
              <td>Изображение</td>
              <td>Действие</td>
          </tr>
      </thead>

      <tbody>
          <?php foreach($programs as $program):?>
              <tr>
                  <td><?= $program->name?></td>
                  <td><?= $program->description?></td>
                  <td><?= Html::img($program->getImage(), ['width'=>200])?></td>
                  <td>
                      <a class="btn btn-success" href="<?= Url::toRoute(['program/view', 'id'=>$program->id]);?>">Подробнее</a>
                      <a class="btn btn-primary" href="<?= Url::toRoute(['program/update', 'id'=>$program->id]);?>">Изменить</a>
                  </td>
              </tr>
          <?php endforeach;?>
      </tbody>
  </table>
</div>
