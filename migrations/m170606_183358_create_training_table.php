<?php

use yii\db\Migration;

class m170606_183358_create_training_table extends Migration
{

    public function up()
    {
        $this->createTable('training', [
            'id' => $this->primaryKey(),
            'idType' => $this->integer()->notNull(),
            'day' => $this->string(),
            'price' => $this->integer(),
        ]);

        // creates index for column `idType`
        $this->createIndex(
            'idx-training-idType',
            'training',
            'idType'
        );

        // add foreign key for table `typeTraining`
        $this->addForeignKey(
            'fk-training-idType',
            'training',
            'idType',
            'typeTraining',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drops foreign key for table `typeTraining`
        $this->dropForeignKey(
            'fk-training-idType',
            'training'
        );

        // drops index for column `idType`
        $this->dropIndex(
            'idx-training-idType',
            'training'
        );

        $this->dropTable('training');
    }
}
