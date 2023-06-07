<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tasks}}`.
 */
class m230607_092922_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tasks}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'isDone' => $this->boolean(),
            'created_at' => $this->date(),
            'updated_at' => $this->date(),
            'todo_id' => $this->integer(11),
            'user_id' => $this->integer(11),
        ]);

        $this->createIndex(
            'idx-tasks-user_id',
            'tasks',
            'user_id'
        );

        $this->createIndex(
            'idx-tasks-todo_id',
            'tasks',
            'todo_id'
        );


        $this->addForeignKey(
            'fk-tasks-user_id',
            'tasks',
            'user_id',
            'user',
            'id',
            'SET NULL'
        );

        $this->addForeignKey(
            'fk-tasks-todo_id',
            'tasks',
            'todo_id',
            'todo',
            'id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tasks}}');
    }
}
