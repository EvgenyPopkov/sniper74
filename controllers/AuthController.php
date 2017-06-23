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
use app\models\RegisterForm;
use app\models\RegisterWait;
use app\models\PhoneForm;
use app\models\Entry;
use app\models\EntrySbor;
use app\models\Sbor;
use app\models\Subscribe;

class AuthController extends Controller
{
    public $layout = 'main';

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
        $this->initParams(Contacts::getJson(), Sbor::getCount());

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

    public function actionSignup($email)
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        if(!RegisterWait::findOne(['email'=>$email])) return $this->redirect(['site/error']);

        $model = new SignupForm();
        if($model->load(Yii::$app->request->post()) && $model->signup($email)){

            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegisterForm();
        if($model->load(Yii::$app->request->post())) {
            if($model->validate() && $model->Register()){
                Yii::$app->getSession()->setFlash('register-sendmail', 'Вам на почту выслали письмо для подтверждения регистрации');
                $wait = new RegisterWait();
                $wait->AddUser($model);
                return $this->refresh();
            }
        }

        return $this->render('register', [
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

      $user = Yii::$app->user->identity;

      $model = new RepairPasswordForm();
      if ($model->load(Yii::$app->request->post()) && $model->validate()) {
          $user->password = Yii::$app->getSecurity()->generatePasswordHash($model->new);
          if($user->save()){
            Yii::$app->getSession()->setFlash('repair', 'Пароль успешно изменен');
            return $this->refresh();
          }

          return $this->goBack();
      }

      $phone = new PhoneForm();
      if ($phone->load(Yii::$app->request->post())) {
          $user->phone = $phone->phone;
          if($user->save()){
            Yii::$app->getSession()->setFlash('phone', 'Номер телефона успешно изменен');
            return $this->refresh();
          }
      }

      return $this->render('room', [
          'model' => $model,
          'phone' =>$phone
      ]);
    }

    public function actionCancel($id)
    {
      $entry = Entry::getEntry($id);

      if ($entry->delete()){
          $entry->SendMailCancel();
          Yii::$app->getSession()->setFlash('entrydelete', 'Запись на тренировку отменена');
      }

      return $this->redirect(['auth/room']);
    }

    public function actionCancelsbor($id)
    {
      $entry = EntrySbor::getEntry($id);

      if ($entry->delete()){
          $entry->SendMailCancel();
          Yii::$app->getSession()->setFlash('entrysbordelete', 'Запись на сборы отменена');
      }

      return $this->redirect(['auth/room']);
    }

    public function actionUnsubscribe($email)
    {
        $sub = Subscribe::findOne(['email' => $email]);
        $sub->status = 0;
        $sub->save(false);

        return $this->redirect(['site/index']);
    }

    public function initParams($model, $sbor)
    {
      $this->view->params['address'] = $model['address'];
      $this->view->params['phone'] = $model['phone'];
      $this->view->params['email'] = $model['email'];
      $this->view->params['vk'] = $model['vk'];
      $this->view->params['instagram'] = $model['instagram'];
      $this->view->params['youtube'] = $model['youtube'];
      $this->view->params['sbor'] = $sbor;
    }
}
