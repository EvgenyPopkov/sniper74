<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Photo;
use app\models\PhotoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ImageUpload;
use yii\web\UploadedFile;

class PhotoController extends Controller
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
        $searchModel = new PhotoSearch();
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
        $model = new Photo();
        $image = new ImageUpload();
        $image->dir = 'photo';

        if ($model->load(Yii::$app->request->post()) && $image->load(Yii::$app->request->post())) {
            if($model->save() && $this->SetImage($model->id, $image)){
              return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'image' => $image
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
        if (($model = Photo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Страница не найдена');
        }
    }

    public function actionImage($id)
    {
        $model = new ImageUpload;
        $model->dir = 'photo';
        if (Yii::$app->request->isPost)
        {
            $photo = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'image');
            if($photo->saveImage($model->uploadFile($file, $photo->name)))
            {
                return $this->redirect(['view', 'id'=>$photo->id]);
            }
        }

        return $this->render('image', ['model'=>$model]);
    }

    public function SetImage($id, $image)
    {
        $article = $this->findModel($id);
        $file = UploadedFile::getInstance($image, 'image');
        return $article->saveImage($image->uploadFile($file, $article->image,$image->dir));
    }
}
