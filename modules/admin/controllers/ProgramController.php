<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Program;
use app\models\ProgramSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ImageUpload;
use yii\web\UploadedFile;

class ProgramController extends Controller
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
        $programs = Program::find()->all();
        return $this->render('index', [
            'programs' => $programs
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
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

    protected function findModel($id)
    {
        if (($model = Program::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Страница не найдена');
        }
    }

    public function actionImage($id)
    {
        $model = new ImageUpload;
        $model->dir = 'training';
        if (Yii::$app->request->isPost)
        {
            $program = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'image');
            if($program->saveImage($model->uploadFile($file, $program->image)))
            {
                return $this->redirect(['view', 'id'=>$program->id]);
            }
        }

        return $this->render('image', ['model'=>$model]);
    }
}
