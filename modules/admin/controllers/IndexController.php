<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\IndexPage;
use app\models\ImageUpload;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class IndexController extends Controller
{
    public function actionView()
    {
        return $this->render('view', [
            'model' => $this->findModel(),
        ]);
    }

    public function actionUpdate()
    {
        $model = $this->findModel();
        if($model->load(Yii::$app->request->post())) {
          if ($model->savePage()) {
            return $this->redirect(['view']);
          }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    protected function findModel()
    {
        $page = new IndexPage();
        if ($page->getIndexPage()) {
            return $page;
        } else {
            throw new NotFoundHttpException('Запрашиваемая страница не найдена');
        }
    }

    public function actionImageshot()
    {
        $model = new ImageUpload;
        $model->dir = 'index';
        if (Yii::$app->request->isPost)
        {
            $page = $this->findModel();
            $file = UploadedFile::getInstance($model, 'image');
            if($page->saveImageShot($model->uploadFile($file, $page['imageShot'])))
            {
                return $this->redirect(['view']);
            }
        }

        return $this->render('image', ['model'=>$model]);
    }

    public function actionImagedribbling()
    {
        $model = new ImageUpload;
        $model->dir = 'index';
        if (Yii::$app->request->isPost)
        {
            $page = $this->findModel();
            $file = UploadedFile::getInstance($model, 'image');
            if($page->saveImageDribbling($model->uploadFile($file, $page['imageDribbling'])))
            {
                return $this->redirect(['view']);
            }
        }

        return $this->render('image', ['model'=>$model]);
    }

    public function actionImagescating()
    {
        $model = new ImageUpload;
        $model->dir = 'index';
        if (Yii::$app->request->isPost)
        {
            $page = $this->findModel();
            $file = UploadedFile::getInstance($model, 'image');
            if($page->saveImageScating($model->uploadFile($file, $page['imageScating'])))
            {
                return $this->redirect(['view']);
            }
        }

        return $this->render('image', ['model'=>$model]);
    }
}
