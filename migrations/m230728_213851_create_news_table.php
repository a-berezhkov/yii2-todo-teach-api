<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m230728_213851_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'created_at' => $this->date(),
            'created_by' => $this->integer(11),
            'category_id' => $this->integer(11),

        ]);

        $this->createIndex(
            'idx-news-user_id',
            'news',
            'created_by'
        );

        $this->addForeignKey(
            'fk-news-user_id',
            'news',
            'created_by',
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
        $this->dropTable('{{%news}}');
    }
}
