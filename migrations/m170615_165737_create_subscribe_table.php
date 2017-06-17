<?php

use yii\db\Migration;

class m170615_165737_create_subscribe_table extends Migration
{
    public function up()
    {
        $this->createTable('subscribe', [
            'id' => $this->primaryKey(),
            'email' => $this->string(),
            'date' => $this->date(),
            'status' => $this->boolean(),
        ]);
    }

    public function down()
    {
        $this->dropTable('subscribe');
    }
}
