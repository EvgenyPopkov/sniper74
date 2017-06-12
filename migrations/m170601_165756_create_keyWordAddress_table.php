<?php

use yii\db\Migration;

/**
 * Handles the creation of table `keyWordAddress`.
 */
class m170601_165756_create_keyWordAddress_table extends Migration
{
    public function up()
    {
        $this->createTable('key_word_address', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('key_word_address');
    }
}
