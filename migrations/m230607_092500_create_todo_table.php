<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%todo}}`.
 */
class m230607_092500_create_todo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%todo}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11),
        ]);

        $this->createIndex(
            'idx-todo-user_id',
            'todo',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-todo-user_id',
            'todo',
            'user_id',
            'user',
            'id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%todo}}');
    }
}
