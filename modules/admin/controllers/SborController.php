<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Sbor;
use app\models\SborSearch;
use yii\web\Controller;
use app\models\ImageUpload;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class SborController extends Controller
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
        $searchModel = new SborSearch();
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
        $model = new Sbor();

        if ($model->load(Yii::$app->request->post())){
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionImage($id)
    {
        $model = new ImageUpload;
        $model->dir = 'sbor';
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
        if (($model = Sbor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Страница не найдена');
        }
    }
}
