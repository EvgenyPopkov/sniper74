<?php

use yii\db\Migration;

class m170605_073639_create_aboutPage_table extends Migration
{
    public function up()
    {
        $this->createTable('about_page', [
            'id' => $this->primaryKey(),
            'we' => $this->text(),
            'training' => $this->text(),
            'footer' => $this->text(),
            'gym' => $this->text(),
        ]);
    }

    public function down()
    {
        $this->dropTable('about_page');
    }
}
