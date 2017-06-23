<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Article;
use app\models\ArticleSearch;
use app\models\Category;
use app\models\ImageUpload;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;

class ArticleController extends Controller
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
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id)
        ]);
    }

    public function actionCreate()
    {
        $model = new Article();
        $image = new ImageUpload();
        $image->dir = 'articles';
        $categories = ArrayHelper::map(Category::find()->all(), 'id', 'name');

        if(Yii::$app->request->isPost) {
          $category = Yii::$app->request->post('category');

          if ($model->load(Yii::$app->request->post()) && $image->load(Yii::$app->request->post())){
            $model->idCategory = $category;

            if ($model->save() && $this->SetImage($model->id, $image) && $this->SetCategory($model->id, $category)) {
                Category::CountAdd($category);
                return $this->redirect(['view', 'id' => $model->id]);
            }
          }
        }

        return $this->render('create', [
            'model' => $model,
            'categories'=>$categories,
            'image' => $image
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $categories = ArrayHelper::map(Category::find()->all(), 'id', 'name');
        $categoryId = $model->category->id;

        if(Yii::$app->request->isPost) {
          $category = Yii::$app->request->post('category');

          if ($model->load(Yii::$app->request->post())){
            $model->idCategory = $category;

            if ($model->save() && $this->SetCategory($model->id, $category)) {
                  Category::CountRemove($categoryId);
                  Category::CountAdd($category);
                  return $this->redirect(['view', 'id' => $model->id]);
            }
          }
        }

        return $this->render('update', [
            'model' => $model,
            'categories'=>$categories,
            'categoryId' => $categoryId
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        Category::CountRemove($model->category->id);
        $model->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Страница не найдена');
        }
    }

    public function actionImage($id)
    {
        $model = new ImageUpload;
        $model->dir = 'articles';
        if (Yii::$app->request->isPost)
        {
            $article = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'image');
            if($article->saveImage($model->uploadFile($file, $article->image)))
            {
                return $this->redirect(['view', 'id'=>$article->id]);
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

    public function SetCategory($id, $category)
    {
        $article = $this->findModel($id);
        return $article->saveCategory($category);
    }
}
