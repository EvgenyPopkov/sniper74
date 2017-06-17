<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Вход - Sniper Хоккейный центр';
$this->registerCssFile('@web/css/open.css', ['depends' => ['app\assets\AppAsset']]);

?>
<form class="form-open" action="<?=Yii::$app->urlManager->createUrl('session/get')?>">
  <input name="key" type="text" placeholder="key word"><br>
  <button type='submit' class="btn btn-success" >Send</button>
</form>
