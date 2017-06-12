<?php

use yii\db\Migration;

class m170605_175150_create_task_table extends Migration
{
    public function up()
    {
        $this->createTable('task', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('task');
    }
}
