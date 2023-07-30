<?php

use yii\db\Migration;

/**
 * Class m230730_195022_add_updated_by_field_to_news_table
 */
class m230730_195022_add_updated_by_field_to_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("news", "updated_by", $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn("news","updated_by");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230730_195022_add_updated_by_field_to_news_table cannot be reverted.\n";

        return false;
    }
    */
}
