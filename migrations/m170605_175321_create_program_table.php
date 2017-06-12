<?php

use yii\db\Migration;

class m170605_175321_create_program_table extends Migration
{
    public function up()
    {
        $this->createTable('program', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->text(),
            'image' => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('program');
    }
}
