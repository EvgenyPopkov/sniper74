<?php
namespace app\models;
use Yii;
use yii\base\Model;
class CommentForm extends Model
{
    public $comment;

    public function rules()
    {
        return [
            [['comment'], 'required']
        ];
    }

    public function attributeLabels()
    {
        return [
            'comment' => 'Комментарий',
        ];
    }

    public function saveComment($article_id)
    {
        $comment = new Comment;
        $comment->text = $this->comment;
        $comment->idUser = Yii::$app->user->id;
        $comment->idArticle = $article_id;
        $comment->status = 0;
        $comment->date = date('Y-m-d');
        return $comment->save();
    }
}
