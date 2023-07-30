<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%order_news_category}}`.
 */
class m230730_164250_drop_order_news_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn("news_category","order" );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn("news_category", "order", $this->integer(11));
    }
}
