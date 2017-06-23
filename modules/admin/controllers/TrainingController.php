<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Training;
use app\models\TrainingSearch;
use app\models\TypeTraining;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

class TrainingController extends Controller
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
        $searchModel = new TrainingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Training();
        $types = ArrayHelper::map(TypeTraining::find()->all(), 'id', 'name');

        if(Yii::$app->request->isPost) {
          $type = Yii::$app->request->post('type');

          if ($model->load(Yii::$app->request->post())){
            $model->idType = $type;

            if ($model->save() && $this->SetType($model->id, $type)) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
          }
        }

        return $this->render('create', [
            'model' => $model,
            'types'=> $types
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $types = ArrayHelper::map(TypeTraining::find()->all(), 'id', 'name');
        $typeId = $model->type->id;

        if(Yii::$app->request->isPost) {
          $type = Yii::$app->request->post('type');

          if ($model->load(Yii::$app->request->post())){
            $model->idType = $type;

            if ($model->save() && $this->SetType($model->id, $type)) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
          }
        }

        return $this->render('update', [
            'model' => $model,
            'types'=> $types,
            'typeId'=> $typeId
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Training::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Страница не найдена');
        }
    }

    public function SetType($id, $type)
    {
        $training = $this->findModel($id);
        return $training->saveType($type);
    }
}
