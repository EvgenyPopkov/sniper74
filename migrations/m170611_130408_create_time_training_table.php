<?php

use yii\db\Migration;

class m170611_130408_create_time_training_table extends Migration
{
    public function up()
    {
        $this->createTable('time_training', [
            'id' => $this->primaryKey(),
            'idTraining' => $this->integer()->notNull(),
            'idAddress' => $this->integer()->notNull(),
            'begin' => $this->string(),
            'end' => $this->string(),
        ]);

        // creates index for column `idTraining`
        $this->createIndex(
            'idx-time_training-idTraining',
            'time_training',
            'idTraining'
        );

        // add foreign key for table `training`
        $this->addForeignKey(
            'fk-time_training-idTraining',
            'time_training',
            'idTraining',
            'training',
            'id',
            'CASCADE'
        );

        // creates index for column `idAddress`
        $this->createIndex(
            'idx-time_training-idAddress',
            'time_training',
            'idAddress'
        );

        // add foreign key for table `address`
        $this->addForeignKey(
            'fk-time_training-idAddress',
            'time_training',
            'idAddress',
            'address',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drops foreign key for table `training`
        $this->dropForeignKey(
            'fk-time_training-idTraining',
            'time_training'
        );

        // drops index for column `idTraining`
        $this->dropIndex(
            'idx-time_training-idTraining',
            'time_training'
        );

        // drops foreign key for table `address`
        $this->dropForeignKey(
            'fk-time_training-idAddress',
            'time_training'
        );

        // drops index for column `idAddress`
        $this->dropIndex(
            'idx-time_training-idAddress',
            'time_training'
        );

        $this->dropTable('time_training');
    }
}
