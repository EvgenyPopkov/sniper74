<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Contacts;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ContactController extends Controller
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
        $page = new Contacts();
        if ($page->getContacts()) {
            return $page;
        } else {
            throw new NotFoundHttpException('Запрашиваемая страница не найдена');
        }
    }
}
