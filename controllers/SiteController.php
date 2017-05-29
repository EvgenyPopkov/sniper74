<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Contacts;
use app\models\ContactsForm;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new Contacts();
        $this->initParams($model);
        
        return $this->render('index',[
            'model' => $model->getContacst(),
        ]);
    }

    public function actionAbout()
    {
        $model = new Contacts();
        $this->initParams($model);

        return $this->render('about',[
            'model' => $model->getContacst(),
        ]);
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function initParams($model)
    {
      $this->view->params['address'] = $model->address;
      $this->view->params['phone'] = $model->phone;
      $this->view->params['email'] = $model->email;
      $this->view->params['vk'] = $model->vk;
      $this->view->params['instagram'] = $model->instagram;
      $this->view->params['youtube'] = $model->youtube;
    }

}
