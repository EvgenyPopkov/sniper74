<?php

use yii\db\Migration;

class m170601_185323_create_video_table extends Migration
{
    public function up()
    {
        $this->createTable('video', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'proirity' => $this->integer(),
            'date' => $this->date(),
        ]);
    }

    public function down()
    {
        $this->dropTable('video');
    }
}
