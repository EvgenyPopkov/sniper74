<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\EntrySbor;
use app\models\EntrySborSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class EntrysborController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new EntrySborSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index',[
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
        ]);
    }
}
