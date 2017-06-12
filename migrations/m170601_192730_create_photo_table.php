<?php

use yii\db\Migration;

class m170601_192730_create_photo_table extends Migration
{
    public function up()
    {
       $this->createTable('photo', [
           'id' => $this->primaryKey(),
           'name' => $this->string(),
           'proirity' => $this->integer(),
           'date' => $this->date(),
       ]);
    }

    public function down()
    {
        $this->dropTable('photo');
    }
}
