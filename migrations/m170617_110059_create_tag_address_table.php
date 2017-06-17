<?php

use yii\db\Migration;

class m170617_110059_create_tag_address_table extends Migration
{
    public function up()
    {
        $this->createTable('tag_address', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('tag_address');
    }
}
