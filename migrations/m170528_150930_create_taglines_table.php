<?php

use yii\db\Migration;

class m170528_150930_create_taglines_table extends Migration
{
    public function up()
    {
        $this->createTable('contact', [
            'id' => $this->primaryKey(),
            'address' => $this->string(150),
            'phone' => $this->string(20),
            'email' => $this->string(100),
            'vk' => $this->string(100),
            'instagram' => $this->string(100),
            'youtube' => $this->string(100)
        ]);
    }

    public function down()
    {
        $this->dropTable('taglines');
    }
}
