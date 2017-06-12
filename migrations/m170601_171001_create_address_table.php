<?php

use yii\db\Migration;

/**
 * Handles the creation of table `address`.
 * Has foreign keys to the tables:
 *
 * - `keyWordAddress`
 */
class m170601_171001_create_address_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('address', [
            'id' => $this->primaryKey(),
            'idKeyWord' => $this->integer()->notNull(),
            'address' => $this->string(),
            'description' => $this->string(),
            'width' => $this->double(),
            'height' => $this->double(),
        ]);

        // creates index for column `idKeyWord`
        $this->createIndex(
            'idx-address-idKeyWord',
            'address',
            'idKeyWord'
        );

        // add foreign key for table `keyWordAddress`
        $this->addForeignKey(
            'fk-address-idKeyWord',
            'address',
            'idKeyWord',
            'keyWordAddress',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `keyWordAddress`
        $this->dropForeignKey(
            'fk-address-idKeyWord',
            'address'
        );

        // drops index for column `idKeyWord`
        $this->dropIndex(
            'idx-address-idKeyWord',
            'address'
        );

        $this->dropTable('address');
    }
}
