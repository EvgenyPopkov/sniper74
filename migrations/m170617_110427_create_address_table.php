<?php

use yii\db\Migration;

class m170617_110427_create_address_table extends Migration
{
    public function up()
    {
        $this->createTable('address', [
            'id' => $this->primaryKey(),
            'idTag' => $this->integer()->notNull(),
            'address' => $this->string(),
            'description' => $this->string(),
            'width' => $this->double(),
            'height' => $this->double(),
        ]);

        // creates index for column `idTag`
        $this->createIndex(
            'idx-address-idTag',
            'address',
            'idTag'
        );

        // add foreign key for table `tag_address`
        $this->addForeignKey(
            'fk-address-idTag',
            'address',
            'idTag',
            'tag_address',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drops foreign key for table `tag_address`
        $this->dropForeignKey(
            'fk-address-idTag',
            'address'
        );

        // drops index for column `idTag`
        $this->dropIndex(
            'idx-address-idTag',
            'address'
        );

        $this->dropTable('address');
    }
}
