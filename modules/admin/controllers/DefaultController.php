<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\models\User;
use app\models\RegisterWait;
use app\models\Entry;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', [
          'user' => User::find()->count(),
          'wait' => RegisterWait::find()->count(),
          'entry' => Entry::find()->count()
        ]);
    }
}
