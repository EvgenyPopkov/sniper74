<?php

use yii\db\Migration;

class m170605_175845_create_junction_table_for_task_and_program_tables extends Migration
{
    public function up()
    {
        $this->createTable('task_program', [
            'idTask' => $this->integer(),
            'idProgram' => $this->integer(),
            'PRIMARY KEY(idTask, idProgram)',
        ]);

        // creates index for column `idTask`
        $this->createIndex(
            'idx-task_program-idTask',
            'task_program',
            'idTask'
        );

        // add foreign key for table `task`
        $this->addForeignKey(
            'fk-task_program-idTask',
            'task_program',
            'idTask',
            'task',
            'id',
            'CASCADE'
        );

        // creates index for column `idProgram`
        $this->createIndex(
            'idx-task_program-idProgram',
            'task_program',
            'idProgram'
        );

        // add foreign key for table `program`
        $this->addForeignKey(
            'fk-task_program-idProgram',
            'task_program',
            'idProgram',
            'program',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drops foreign key for table `task`
        $this->dropForeignKey(
            'fk-task_program-idTask',
            'task_program'
        );

        // drops index for column `idTask`
        $this->dropIndex(
            'idx-task_program-idTask',
            'task_program'
        );

        // drops foreign key for table `program`
        $this->dropForeignKey(
            'fk-task_program-idProgram',
            'task_program'
        );

        // drops index for column `idProgram`
        $this->dropIndex(
            'idx-task_program-idProgram',
            'task_program'
        );

        $this->dropTable('task_program');
    }
}
