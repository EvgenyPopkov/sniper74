<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Address;
use app\models\AddressSearch;
use app\models\TagAddress;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

class AddressController extends Controller
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
        $searchModel = new AddressSearch();
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
        $model = new Address();

        $tags = ArrayHelper::map(TagAddress::find()->all(), 'id', 'name');

        if(Yii::$app->request->isPost) {
          $tag = Yii::$app->request->post('tag');

          if ($model->load(Yii::$app->request->post())){
            $model->idTag = $tag;

            if ($model->save() && $this->SetTag($model->id, $tag)) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
          }
        }

        return $this->render('create', [
            'model' => $model,
            'tags'=> $tags
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $tags = ArrayHelper::map(TagAddress::find()->all(), 'id', 'name');
        $tagId = $model->tag->id;

        if(Yii::$app->request->isPost) {
          $tag = Yii::$app->request->post('tag');

          if ($model->load(Yii::$app->request->post())){
            $model->idTag = $tag;

            if ($model->save() && $this->SetTag($model->id, $tag)) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
          }
        }


        return $this->render('update', [
            'model' => $model,
            'tags'=> $tags,
            'tagId'=> $tagId
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Address::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Страница не найдена');
        }
    }

    public function SetTag($id, $tag)
    {
        $address = $this->findModel($id);
        return $address->saveTag($tag);
    }
}
