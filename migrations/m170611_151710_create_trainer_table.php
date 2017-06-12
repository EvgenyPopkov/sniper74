<?php

use yii\db\Migration;

class m170611_151710_create_trainer_table extends Migration
{
    public function up()
    {
        $this->createTable('trainer', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->text(),
            'image' => $this->string(),
            'priority' => $this->integer(),
            'date' => $this->date(),
        ]);
    }

    public function down()
    {
        $this->dropTable('trainer');
    }
}
