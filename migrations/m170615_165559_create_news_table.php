<?php

use yii\db\Migration;

class m170615_165559_create_news_table extends Migration
{
    public function up()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'content' => $this->text(),
            'image' => $this->string(),
            'priority' => $this->integer(),
            'date' => $this->date(),
        ]);
    }

    public function down()
    {
        $this->dropTable('news');
    }
}
