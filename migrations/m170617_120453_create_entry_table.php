<?php

use yii\db\Migration;

class m170617_120453_create_entry_table extends Migration
{
    public function up()
    {
        $this->createTable('entry', [
            'id' => $this->primaryKey(),
            'idTime' => $this->integer()->notNull(),
            'idUser' => $this->integer()->notNull(),
            'description' => $this->string(),
            'date' => $this->date(),
            'status' => $this->boolean(),
        ]);

        // creates index for column `idTime`
        $this->createIndex(
            'idx-entry-idTime',
            'entry',
            'idTime'
        );

        // add foreign key for table `time_training`
        $this->addForeignKey(
            'fk-entry-idTime',
            'entry',
            'idTime',
            'time_training',
            'id',
            'CASCADE'
        );

        // creates index for column `idUser`
        $this->createIndex(
            'idx-entry-idUser',
            'entry',
            'idUser'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-entry-idUser',
            'entry',
            'idUser',
            'user',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drops foreign key for table `time_training`
        $this->dropForeignKey(
            'fk-entry-idTime',
            'entry'
        );

        // drops index for column `idTime`
        $this->dropIndex(
            'idx-entry-idTime',
            'entry'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-entry-idUser',
            'entry'
        );

        // drops index for column `idUser`
        $this->dropIndex(
            'idx-entry-idUser',
            'entry'
        );

        $this->dropTable('entry');
    }
}
