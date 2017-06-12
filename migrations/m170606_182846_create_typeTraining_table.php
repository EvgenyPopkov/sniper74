<?php

use yii\db\Migration;

class m170606_182846_create_typeTraining_table extends Migration
{
    public function up()
    {
        $this->createTable('type_training', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('type_training');
    }
}
