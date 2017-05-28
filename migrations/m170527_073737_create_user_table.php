<?php

use yii\db\Migration;

class m170527_073737_create_user_table extends Migration
{
    public function up()
    {
        $this->createTable('user', [
          'id' => $this->primaryKey(),
          'firstName'=>$this->string(50),
          'lastName'=>$this->string(50),
          'email'=>$this->string(50)->unique(),
          'phone'=>$this->string(11),
          'password'=>$this->string(),
          'dateRegister'=>$this->date(),
          'authKey'=>$this->string(),
          'isAdmin'=>$this->boolean()->defaultValue(false)
        ]);
    }

    public function down()
    {
        $this->dropTable('user');
    }
}
