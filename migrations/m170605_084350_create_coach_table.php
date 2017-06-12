<?php

use yii\db\Migration;

class m170605_084350_create_coach_table extends Migration
{
    public function up()
    {
        $this->createTable('coach', [
            'id' => $this->primaryKey(),
            'firstName' => $this->string(),
            'lastName' => $this->string(),
            'place' => $this->string(),
            'description' => $this->text(),
            'vk' => $this->string(),
            'image' => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('coach');
    }
}
