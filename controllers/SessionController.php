<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class SessionController extends Controller
{
  public $layout = 'openlayout';

  public function actionOpen()
  {
      return $this->render('open');
  }

  public function actionGet($key)
  {
      if ($key == "itegavno")
        Yii::$app->session->set('open',true);
      return $this->redirect(['site/index']);
  }

}
