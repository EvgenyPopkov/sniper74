<?php

namespace app\models;

use Yii;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;

class Article extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'article';
    }

    public function rules()
    {
        return [
            [['title','description','content'], 'required', 'message' => 'Обязательное поле'],
            [['idCategory', 'viewed'], 'integer'],
            [['description', 'content'], 'string'],
            [['date'], 'default', 'value' => date('Y-m-d')],
            [['title', 'image', 'video'], 'string', 'max' => 255],
            [['idCategory'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['idCategory' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idCategory' => 'Категория',
            'title' => 'Заголовок',
            'description' => 'Описание',
            'content' => 'Контент',
            'date' => 'Дата',
            'image' => 'Изображение',
            'video' => 'Видео',
            'viewed' => 'Просмотры',
        ];
    }

    public function saveArticle()
    {
      $this->user_id = Yii::$app->user->id;
      return $this->save(false);
    }

    public function saveImage($filename)
    {
       $this->image = $filename;
       return $this->save(false);
    }

    public function getImage()
    {
       return ($this->image) ? '@web/images/articles/' . $this->image : 'no-image.png';
    }

    public function deleteImage()
    {
       $imageUploadModel = new ImageUpload();
       $imageUploadModel->dir='articles';
       $imageUploadModel->deleteCurrentImage($this->image);
    }

    public function beforeDelete()
    {
       $this->deleteImage();
       return parent::beforeDelete();
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'idCategory']);
    }

    public function saveCategory($categoryId)
    {
        $category = Category::findOne($categoryId);
        if($category != null)
        {
            $this->link('category', $category);
            return true;
        }

        return false;
    }

    public function getDate()
    {
        return Yii::$app->formatter->asDate($this->date);
    }

    public function getForIndex()
    {
        return Article::find()->orderBy('viewed desc')->limit(3)->all();
    }

    public function getAll($pageSize = 3)
    {
        $query = Article::find()->orderBy('viewed desc');
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['articles'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }

    public function getRecent()
    {
        return Article::find()->orderBy('date desc')->limit(3)->all();
    }

    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['idArticle' => 'id']);
    }

    public function getRecentAll()
    {
         $query = Article::find()->orderBy('date desc');
         $count = $query->count();
         $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>3]);
         $recent = $query->offset($pagination->offset)
             ->limit($pagination->limit)
             ->all();

         $data['recent'] = $recent;
         $data['pagination'] = $pagination;

         return $data;
    }


    public function getArticleComments()
    {
      $query = $this->getComments()->where(['status'=>1])->orderBy('date desc');
      $count = $query->count();
      $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>3]);
      $comments = $query->offset($pagination->offset)
          ->limit($pagination->limit)
          ->all();

      $data['comments'] = $comments;
      $data['pagination'] = $pagination;

      return $data;
    }

    public function viewedCounter()
    {
        $this->viewed += 1;
        return $this->save(false);
    }
}
