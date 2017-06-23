<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\News;
use app\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ImageUpload;
use yii\web\UploadedFile;

class NewsController extends Controller
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
        $searchModel = new NewsSearch();
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
        $model = new News();

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
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Страница не найдена');
        }
    }

    public function actionImage($id)
    {
        $model = new ImageUpload;
        $model->dir = 'news';
        if (Yii::$app->request->isPost)
        {
            $news = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'image');
            if($news->saveImage($model->uploadFile($file, $news->image)))
            {
                return $this->redirect(['view', 'id'=>$news->id]);
            }
        }

        return $this->render('image', ['model'=>$model]);
    }

    public function actionImagedel($id)
    {
      if($news = $this->findModel($id)){
          $news->deleteImage();
          $news->image = null;
          $news->save();
      }

      return $this->render('view', [
          'model' => $news,
      ]);
    }

    public function actionPublish($id)
    {
        $news = $this->findModel($id);
        $news->publish();
        $news->disallow();
        return $this->redirect(['index']);
    }
}
