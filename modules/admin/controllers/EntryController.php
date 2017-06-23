<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Entry;
use app\models\EntrySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class EntryController extends Controller
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
        $searchModel = new EntrySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index',[
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDeleteold()
    {
        Entry::delOld();
        return $this->redirect(['index']);
    }
}
