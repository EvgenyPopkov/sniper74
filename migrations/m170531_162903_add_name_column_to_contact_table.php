<?php

use yii\db\Migration;

class m170531_162903_add_name_column_to_contact_table extends Migration
{
    public function up()
    {
        $this->addColumn('contact', 'name', $this->string(100));
    }

    public function down()
    {
        $this->dropColumn('contact', 'name');
    }
}
