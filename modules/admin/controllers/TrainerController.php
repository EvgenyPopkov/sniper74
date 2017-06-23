<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Trainer;
use app\models\TrainerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ImageUpload;
use yii\web\UploadedFile;

class TrainerController extends Controller
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
        $searchModel = new TrainerSearch();
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
        $model = new Trainer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionImage($id)
    {
        $model = new ImageUpload;
        $model->dir = 'trainer';
        if (Yii::$app->request->isPost)
        {
            $trainer = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'image');
            if($trainer->saveImage($model->uploadFile($file, $trainer->image)))
            {
                return $this->redirect(['view', 'id'=>$trainer->id]);
            }
        }

        return $this->render('image', ['model'=>$model]);
    }

    public function actionImagedel($id)
    {
      if($trainer = $this->findModel($id)){
          $trainer->deleteImage();
          $trainer->image = null;
          $trainer->save();
      }

      return $this->render('view', [
          'model' => $trainer,
      ]);
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Trainer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Страница не найдена');
        }
    }
}
