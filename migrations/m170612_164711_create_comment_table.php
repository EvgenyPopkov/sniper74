<?php

use yii\db\Migration;

class m170612_164711_create_comment_table extends Migration
{
    public function up()
    {
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'idArticle' => $this->integer()->notNull(),
            'idUser' => $this->integer()->notNull(),
            'text' => $this->text(),
            'date' => $this->date(),
            'status' => $this->boolean(),
        ]);

        // creates index for column `idArticle`
        $this->createIndex(
            'idx-comment-idArticle',
            'comment',
            'idArticle'
        );

        // add foreign key for table `article`
        $this->addForeignKey(
            'fk-comment-idArticle',
            'comment',
            'idArticle',
            'article',
            'id',
            'CASCADE'
        );

        // creates index for column `idUser`
        $this->createIndex(
            'idx-comment-idUser',
            'comment',
            'idUser'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-comment-idUser',
            'comment',
            'idUser',
            'user',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drops foreign key for table `article`
        $this->dropForeignKey(
            'fk-comment-idArticle',
            'comment'
        );

        // drops index for column `idArticle`
        $this->dropIndex(
            'idx-comment-idArticle',
            'comment'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-comment-idUser',
            'comment'
        );

        // drops index for column `idUser`
        $this->dropIndex(
            'idx-comment-idUser',
            'comment'
        );

        $this->dropTable('comment');
    }
}
