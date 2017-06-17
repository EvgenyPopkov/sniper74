<?php

namespace app\controllers;

use Yii;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Contacts;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\SendpasswordForm;
use app\models\RepairPasswordForm;

class AuthController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        $this->initParams(Contacts::getContacts());

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


    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSignup()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new SignupForm();
        if($model->load(Yii::$app->request->post()) && $model->signup()){
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionSendpassword()
    {
        $model = new SendpasswordForm();

        if($model->load(Yii::$app->request->post())) {
            if(!$model->validate()){
                return $this->render('sendpassword', [
                    'model' => $model
                ]);
            }
            if ($model->repairPassword()){
                Yii::$app->getSession()->setFlash('repair', 'Пароль успешно восстановлен');
                return $this->redirect(['auth/login']);
            }
        }

        return $this->render('sendpassword', [
            'model' => $model
        ]);
    }

    public function actionRoom()
    {
      if(Yii::$app->user->isGuest) {
          return $this->goHome();
      }

      $model = new RepairPasswordForm();
      if ($model->load(Yii::$app->request->post())) {
          return $this->goBack();
      }

      return $this->render('room', [
          'model' => $model
      ]);
    }

    public function initParams($model)
    {
      $this->view->params['address'] = $model['address'];
      $this->view->params['phone'] = $model['phone'];
      $this->view->params['email'] = $model['email'];
      $this->view->params['vk'] = $model['vk'];
      $this->view->params['instagram'] = $model['instagram'];
      $this->view->params['youtube'] = $model['youtube'];
    }

}
