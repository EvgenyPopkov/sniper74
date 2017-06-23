<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Coach;
use app\models\CoachSearch;
use yii\web\Controller;
use app\models\ImageUpload;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class CoachController extends Controller
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
        $searchModel = new CoachSearch();
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
        $model = new Coach();

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

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Coach::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Страница не найдена');
        }
    }

    public function actionImage($id)
    {
        $model = new ImageUpload;
        $model->dir = 'coaches';
        if (Yii::$app->request->isPost)
        {
            $sbor = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'image');
            if($sbor->saveImage($model->uploadFile($file, $sbor->image)))
            {
                return $this->redirect(['view', 'id'=>$sbor->id]);
            }
        }

        return $this->render('image', ['model'=>$model]);
    }

    public function actionImagedel($id)
    {
      if($sbor = $this->findModel($id)){
          $sbor->deleteImage();
          $sbor->image = null;
          $sbor->save();
      }

      return $this->render('view', [
          'model' => $sbor,
      ]);
    }

}
