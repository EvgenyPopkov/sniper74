<?php

use yii\db\Migration;

class m170612_164441_create_article_table extends Migration
{
    public function up()
    {
        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'idCategory' => $this->integer()->notNull(),
            'title' => $this->string(),
            'description' => $this->text(),
            'content' => $this->text(),
            'date' => $this->date(),
            'image' => $this->string(),
            'video' => $this->string(),
            'viewed' => $this->integer(),
        ]);

        // creates index for column `idCategory`
        $this->createIndex(
            'idx-article-idCategory',
            'article',
            'idCategory'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-article-idCategory',
            'article',
            'idCategory',
            'category',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-article-idCategory',
            'article'
        );

        // drops index for column `idCategory`
        $this->dropIndex(
            'idx-article-idCategory',
            'article'
        );

        $this->dropTable('article');
    }
}
