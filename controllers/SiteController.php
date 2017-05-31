<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Contacts;
use app\models\ContactForm;
use app\models\Address;

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
        $this->initParams($model->getContacts());

        return $this->render('index',[
            'model' => $model->getContacts(),
        ]);
    }

    public function actionAbout()
    {
        $model = new Contacts();
        $this->initParams($model->getContacts());

        return $this->render('about',[
            'model' => $model->getContacts(),
        ]);
    }

    public function actionMessage()
    {
      $model = new ContactForm();
      if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
          Yii::$app->session->setFlash('contactFormSubmitted');

          return $this->refresh();
      }
      return $this->render('message', [
          'model' => $model,
      ]);
    }

    public function actionContact()
    {
      $model = new Contacts();
      $address = new Address();
      $this->initParams($model->getContacts(), $address->getAddressBoss());

      return $this->render('contact',[
          'model' => $model->getContacts(),
          'address'=> $address->getAddress(),
          'coordinates'=> $address->getCoordinates(),
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
