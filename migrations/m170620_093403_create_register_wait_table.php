<?php

use yii\db\Migration;

class m170620_093403_create_register_wait_table extends Migration
{
    public function up()
    {
        $this->createTable('register_wait', [
            'id' => $this->primaryKey(),
            'email' => $this->string(),
            'date' => $this->date(),
        ]);
    }

    public function down()
    {
        $this->dropTable('register_wait');
    }
}
