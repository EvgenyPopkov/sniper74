<?php

use yii\db\Migration;

class m170531_162413_create_address_table extends Migration
{
    public function up()
    {
        $this->createTable('address', [
          'id' => $this->primaryKey(),
          'keyWord' => $this->string(),
          'address' => $this->string(150),
          'width' => $this->string(20),
          'height' => $this->string(20),
        ]);
    }

    public function down()
    {
        $this->dropTable('address');
    }
}
