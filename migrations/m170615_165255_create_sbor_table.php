<?php

use yii\db\Migration;

class m170615_165255_create_sbor_table extends Migration
{
    public function up()
    {
        $this->createTable('sbor', [
            'id' => $this->primaryKey(),
            'dateBegin' => $this->date(),
            'dateEnd' => $this->date(),
            'head' => $this->string(),
            'description' => $this->text(),
            'price' => $this->string(),
            'image' => $this->string(),
            'status' => $this->boolean(),
            'priority' => $this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable('sbor');
    }
}
