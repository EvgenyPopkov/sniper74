<?php

use yii\db\Migration;

class m170615_170242_create_entry_table extends Migration
{

    public function up()
    {
        $this->createTable('entry', [
            'id' => $this->primaryKey(),
            'idTimeTraining' => $this->integer()->notNull(),
            'idUser' => $this->integer()->notNull(),
            'date' => $this->date(),
            'status' => $this->boolean(),
        ]);

        // creates index for column `'idTimeTraining`
        $this->createIndex(
            'idx-entry-idTimeTraining',
            'entry',
            'idTimeTraining'
        );

        // add foreign key for table `time_training`
        $this->addForeignKey(
            'fk-entry-idTimeTraining',
            'entry',
            'idTimeTraining',
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
            'fk-entry-idTimeTraining',
            'entry'
        );

        // drops index for column `'idTimeTraining`
        $this->dropIndex(
            'idx-entry-idTimeTraining',
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
