<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Contacts;

class SiteController extends Controller
{
    public $layout = 'landing';

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new Contacts();

        return $this->render('index',[
            'model' => $model->getContacst(),
        ]);
    }

    public function actionAbout()
    {
        $model = new Contacts();

        return $this->render('about',[
            'model' => $model->getContacst(),
        ]);
    }

}
