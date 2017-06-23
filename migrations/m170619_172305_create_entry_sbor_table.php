<?php

use yii\db\Migration;

class m170619_172305_create_entry_sbor_table extends Migration
{
    public function up()
    {
        $this->createTable('entry_sbor', [
            'id' => $this->primaryKey(),
            'idSbor' => $this->integer()->notNull(),
            'idUser' => $this->integer()->notNull(),
        ]);

        // creates index for column `idSbor`
        $this->createIndex(
            'idx-entry_sbor-idSbor',
            'entry_sbor',
            'idSbor'
        );

        // add foreign key for table `sbor`
        $this->addForeignKey(
            'fk-entry_sbor-idSbor',
            'entry_sbor',
            'idSbor',
            'sbor',
            'id',
            'CASCADE'
        );

        // creates index for column `idUser`
        $this->createIndex(
            'idx-entry_sbor-idUser',
            'entry_sbor',
            'idUser'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-entry_sbor-idUser',
            'entry_sbor',
            'idUser',
            'user',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drops foreign key for table `sbor`
        $this->dropForeignKey(
            'fk-entry_sbor-idSbor',
            'entry_sbor'
        );

        // drops index for column `idSbor`
        $this->dropIndex(
            'idx-entry_sbor-idSbor',
            'entry_sbor'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-entry_sbor-idUser',
            'entry_sbor'
        );

        // drops index for column `idUser`
        $this->dropIndex(
            'idx-entry_sbor-idUser',
            'entry_sbor'
        );

        $this->dropTable('entry_sbor');
    }
}
