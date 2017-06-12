<?php

use yii\db\Migration;

class m170611_151648_create_stock_table extends Migration
{
    public function up()
    {
        $this->createTable('stock', [
            'id' => $this->primaryKey(),
            'header' => $this->string(),
            'description' => $this->text(),
            'priority' => $this->integer(),
            'date' => $this->date(),
        ]);
    }

    public function down()
    {
        $this->dropTable('stock');
    }
}
