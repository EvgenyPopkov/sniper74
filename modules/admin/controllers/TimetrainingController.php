<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\TimeTraining;
use app\models\TimeTrainingSearch;
use app\models\Training;
use app\models\Address;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

class TimetrainingController extends Controller
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
        $searchModel = new TimeTrainingSearch();
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
        $model = new TimeTraining();
        $trainings = ArrayHelper::map(Training::find()->all(), 'id', 'description');
        $addresses = ArrayHelper::map(Address::find()->all(), 'id', 'address');

        if(Yii::$app->request->isPost) {
          $training = Yii::$app->request->post('training');
          $address = Yii::$app->request->post('address');

          if ($model->load(Yii::$app->request->post())){
            $model->idTraining = $training;
            $model->idAddress = $address;

            if ($model->save() && $this->SetData($model->id, $training, $address)) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
          }
        }

        return $this->render('create', [
            'model' => $model,
            'trainings'=> $trainings,
            'addresses'=> $addresses
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $trainings = ArrayHelper::map(Training::find()->all(), 'id', 'description');
        $addresses = ArrayHelper::map(Address::find()->all(), 'id', 'address');
        $trainingId = $model->training->id;
        $addressId = $model->address->id;

        if(Yii::$app->request->isPost) {
          $training = Yii::$app->request->post('training');
          $address = Yii::$app->request->post('address');

          if ($model->load(Yii::$app->request->post())){
            $model->idTraining = $training;
            $model->idAddress = $address;

            if ($model->save() && $this->SetData($model->id, $training, $address)) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
          }
        }

        return $this->render('update', [
            'model' => $model,
            'trainings'=> $trainings,
            'addresses'=> $addresses,
            'addressId'=> $addressId,
            'trainingId'=> $trainingId
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = TimeTraining::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Страница не найдена');
        }
    }

    public function SetData($id, $training, $address)
    {
        $time = $this->findModel($id);
        return $time->saveData($training,$address);
    }
}
