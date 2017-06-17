<?php

use yii\db\Migration;

class m170617_115446_create_training_table extends Migration
{
    public function up()
    {
        $this->createTable('training', [
            'id' => $this->primaryKey(),
            'idType' => $this->integer()->notNull(),
            'description' => $this->string(),
            'day' => $this->integer(),
            'price' => $this->integer(),
        ]);

        // creates index for column `idType`
        $this->createIndex(
            'idx-training-idType',
            'training',
            'idType'
        );

        // add foreign key for table `type_training`
        $this->addForeignKey(
            'fk-training-idType',
            'training',
            'idType',
            'type_training',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drops foreign key for table `type_training`
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
