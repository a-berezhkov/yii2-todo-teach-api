<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m230607_090806_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255)->notNull(),
            'auth_key' => $this->string(255),
            'accessToken' => $this->string(255),
            'fname' => $this->string(255),
            'sname' => $this->string(255),
            'lname' => $this->string(255),
            'email' => $this->string(255),
            'password_hash' => $this->string(255)->notNull(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
