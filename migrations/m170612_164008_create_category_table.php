<?php

use yii\db\Migration;

class m170612_164008_create_category_table extends Migration
{
    public function up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('category');
    }
}
