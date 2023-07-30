<?php

use yii\db\Migration;

/**
 * Class m230730_192523_add_created_by_field_to_news_categoty_table
 */
class m230730_192523_add_created_by_field_to_news_categoty_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("news_category", "created_by", $this->integer(11));

        $this->createIndex(
            'idx-news-category-user_id',
            'news_category',
            'created_by'
        );

        $this->addForeignKey(
            'fk-news-category-user_id',
            'news_category',
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
        $this->dropForeignKey("fk-news-category-user_id", "news_category");
        $this->dropIndex("idx-news-category-user_id","news_category");
        $this->dropColumn("created_by","news_category" );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230730_192523_add_created_by_field_to_news_categoty_table cannot be reverted.\n";

        return false;
    }
    */
}
