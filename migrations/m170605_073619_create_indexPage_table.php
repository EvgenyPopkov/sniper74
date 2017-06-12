<?php

use yii\db\Migration;

class m170605_073619_create_indexPage_table extends Migration
{
    public function up()
    {
        $this->createTable('index_page', [
            'id' => $this->primaryKey(),
            'we' => $this->text(),
            'imageDribbling' => $this->string(),
            'imageScating' => $this->string(),
            'imageShot' => $this->string(),
            'imageForward' => $this->string(),
            'imageDefender' => $this->string(),
            'imageGoalkeeper' => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('index_page');
    }
}
