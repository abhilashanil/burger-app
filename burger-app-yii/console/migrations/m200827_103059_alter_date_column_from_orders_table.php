<?php

use yii\db\Migration;

/**
 * Class m200827_103059_alter_date_column_from_orders_table
 */
class m200827_103059_alter_date_column_from_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('orders', 'date', $this->integer(11));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200827_103059_alter_date_column_from_orders_table cannot be reverted.\n";
        $this->alterColumn('orders', 'date', $this->date());
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200827_103059_alter_date_column_from_orders_table cannot be reverted.\n";

        return false;
    }
    */
}
