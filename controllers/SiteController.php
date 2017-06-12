<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Contacts;
use app\models\ContactForm;
use app\models\Address;
use app\models\KeyWordAddress;
use app\models\IndexPage;
use app\models\AboutPage;
use app\models\Coach;
use app\models\Program;
use app\models\Training;
use app\models\Trainer;
use app\models\Stock;

class SiteController extends Controller
{
    public function actions()
    {
        $init = new Contacts();
        $this->initParams($init->getContacts());

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
        $model = Contacts::getContacts();
        $page = IndexPage::getIndexPage();

        return $this->render('index',[
            'model' => $model,
            'page' => $page,
        ]);
    }

    public function actionAbout()
    {
        $model = Contacts::getContacts();
        $page = AboutPage::getAboutPage();
        $coach = Coach::getCoaches();
        $program = Program::getInfo();

        return $this->render('about',[
            'model' => $model,
            'page' => $page,
            'coaches' => $coach,
            'program' => $program,
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
      $model = Contacts::getContacts();
      $boss = Address::getAddressBoss();
      $earth = Address::getAddressEarth();
      $ice = Address::getAddressIce();
      $coordinates = Address::getCoordinates();

      return $this->render('contact',[
          'model' => $model,
          'boss'=> $boss,
          'earth' => $earth,
          'ice' => $ice,
          'coordinates'=> $coordinates,
      ]);
    }

    public function actionTraining()
    {
      $model = Contacts::getContacts();
      $earth = Training::getEarth();
      $ice = Training::getIce();

      return $this->render('training',[
          'model' => $model,
          'earth' => $earth,
          'ice' => $ice,
      ]);
    }

    public function actionPhoto()
    {
      $model = Contacts::getContacts();

      return $this->render('photo',[
          'model' => $model,
      ]);
    }

    public function actionTrainer()
    {
      $model = Contacts::getContacts();
      $trainers = Trainer::getAll();

      return $this->render('trainer',[
          'model' => $model,
          'trainers' => $trainers,
      ]);
    }

    public function actionStock()
    {
      $model = Contacts::getContacts();
      $stockes = Stock::getAll();

      return $this->render('stock',[
          'model' => $model,
          'stockes' => $stockes,
      ]);
    }

    public function actionVideo()
    {
      $model = Contacts::getContacts();

      return $this->render('video',[
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
