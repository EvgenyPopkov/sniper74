<?php

$this->title = 'Страница не найдена (404)';
?>
<div class="pages-error">

  <h1>Страница не найдена</h1>
  <hr/>
  <a href="<?=Yii::$app->urlManager->createUrl('site/index')?>"><button class="btn btn-error">Вернуться на главную</button></a>

</div>
