<?php

$this->title = 'Страница не найдена (404)';
$this->registerCssFile('@web/css/error.css', ['depends' => ['app\assets\AppAsset']]);
?>
<div class="pages-error">

  <h1>Страница не найдена</h1>
  <hr/>
  <a href="<?=Yii::$app->urlManager->createUrl('site/index')?>"><button class="btn btn-error">Вернуться на главную</button></a>

</div>
