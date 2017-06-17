<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Contacts;
use app\models\Address;
use app\models\IndexPage;
use app\models\AboutPage;
use app\models\Coach;
use app\models\Program;
use app\models\Training;
use app\models\TimeTraining;
use app\models\Trainer;
use app\models\Stock;
use app\models\Article;
use app\models\Category;
use app\models\Comment;
use app\models\CommentForm;
use app\models\Photo;
use app\models\Video;
use app\models\Entry;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access'    =>  [
                'class' =>  AccessControl::className(),
                'denyCallback'  =>  function($rule, $action)
                {
                    return $this->redirect(['session/open']);
                },
                'rules' =>  [
                    [
                        'allow' =>  true,
                        'matchCallback' =>  function($rule, $action)
                        {
                            if (Yii::$app->session->get('open') === true) return true;
                            else return false;
                        }
                    ]
                ]
            ]
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

    public function actionIndex()
    {
        $model = Contacts::getContacts();
        $page = IndexPage::getJson();
        $articles = Article::getForIndex();

        return $this->render('index',[
            'model' => $model,
            'page' => $page,
            'articles' => $articles,
        ]);
    }

    public function actionAbout()
    {
        $model = Contacts::getContacts();
        $page = AboutPage::getAboutPage();
        $coach = Coach::getCoaches();
        $photos = Photo::getForAbout();

        return $this->render('about',[
            'model' => $model,
            'page' => $page,
            'coaches' => $coach,
            'photos' => $photos
        ]);
    }

    public function actionProcess()
    {
        $programs = Program::getAll();
        $page = AboutPage::getAboutPage();

        return $this->render('process',[
            'page' => $page,
            'programs' => $programs
        ]);
    }

    public function actionContact()
    {
        $model = Contacts::getContacts();
        $boss = Address::getAddressTag('boss');
        $earth = Address::getAddressTag('earth');
        $ice = Address::getAddressTag('ice');
        $coordinates = Address::getCoordinates();

        return $this->render('contact',[
            'model' => $model,
            'boss'=> $boss,
            'earth' => $earth,
            'ice' => $ice,
            'coordinates'=> $coordinates
        ]);
    }

    public function actionTraining()
    {
        $model = Contacts::getContacts();
        $earth = Training::getTraining('earth');
        $ice = Training::getTraining('ice');

        return $this->render('training',[
            'model' => $model,
            'earth' => $earth,
            'ice' => $ice
        ]);
    }

    public function actionPhoto()
    {
        $data = Photo::getAll();

        return $this->render('photo',[
          'photos'=>$data['photos'],
          'pagination'=>$data['pagination']
        ]);
    }

    public function actionTrainer()
    {
        $trainers = Trainer::getAll();

        return $this->render('trainer',[
            'trainers' => $trainers
        ]);
    }

    public function actionStock()
    {
        $model = Contacts::getContacts();
        $stockes = Stock::getAll();

        return $this->render('stock',[
            'model' => $model,
            'stockes' => $stockes
        ]);
    }

    public function actionVideo()
    {
        $data = Video::getAll();

        return $this->render('video',[
          'videos'=>$data['videos'],
          'pagination'=>$data['pagination']
        ]);
    }

    public function actionLive()
    {
        return $this->render('live');
    }

    public function actionArticle()
    {
        $data = Article::getAll(3);
        $recent = Article::getRecent();
        $categories = Category::getAll();

        return $this->render('article',[
            'articles'=>$data['articles'],
            'pagination'=>$data['pagination'],
            'recent'=>$recent,
            'categories'=>$categories
        ]);
    }

    public function actionRecent()
    {
        $data = Article::getRecentAll();

        return $this->render('recent',[
            'recent'=>$data['recent'],
            'pagination'=>$data['pagination']
        ]);
    }

    public function actionBlog($id)
    {
        $article = Article::findOne($id);

        if(count($article) < 1) return $this->redirect(['site/error']);

        $comments = $article->getArticleComments();
        $commentForm = new CommentForm();
        $article->viewedCounter();

        return $this->render('blog',[
            'article'=>$article,
            'comments'=>$comments['comments'],
            'commentForm'=>$commentForm,
            'pagination'=>$comments['pagination'],
        ]);
    }

    public function actionCategory($id)
    {
        $data = Category::getArticlesByCategory($id);

        if($data === false) return $this->redirect(['site/error']);

        return $this->render('category',[
            'articles'=>$data['articles'],
            'pagination'=>$data['pagination']
        ]);
    }

    public function actionComment($id)
    {
        $model = new CommentForm();

        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->saveComment($id))
            {
                Yii::$app->getSession()->setFlash('comment', 'Ваш комментарий добавлен, он появится после модерации');
                return $this->redirect(['site/blog','id'=>$id]);
            }
        }
    }

    public function actionNews()
    {
        return $this->render('news');
    }

    public function actionEntry($id)
    {
        $model = new Entry();

        if(!$time = TimeTraining::getTime($id)){
          return $this->redirect(['site/error']);
        }

        if(Yii::$app->user->isGuest) {
            Yii::$app->getSession()->setFlash('guestentry', 'Записаться может только авторизованный пользователь');
            return $this->redirect(['site/training']);
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->idTime = $time->id;
            $model->idUser = Yii::$app->user->id;

            if ($model->save()) {
                Yii::$app->getSession()->setFlash('room', 'Вы успешно записались на тренировку');
                return $this->redirect(['auth/room']);
            }
        }

        return $this->render('entry',[
          'model' => $model,
          'time' => $time
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
