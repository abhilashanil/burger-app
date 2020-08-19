<?php

use yii\db\Migration;

/**
 * Class m200819_092248_modify_table_order_ingredients
 */
class m200819_092248_modify_table_order_ingredients extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        //Drop ForeignKey
        $this->dropForeignKey('fk_orderIngredients_ingredients', 'order_ingredients');

        //Drop coloumns ingredient_id & qty from order_ingredients
        $this->dropColumn('order_ingredients','qty');
        $this->dropColumn('order_ingredients', 'ingredient_id');

        // Insert new coloums to order_ingredients table
        $this->addColumn('order_ingredients', 'salad', $this->integer());
        $this->addColumn('order_ingredients', 'cheese', $this->integer());
        $this->addColumn('order_ingredients', 'bacon', $this->integer());
        $this->addColumn('order_ingredients', 'meat', $this->integer());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200819_092248_modify_table_order_ingredients cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200819_092248_modify_table_order_ingredients cannot be reverted.\n";

        return false;
    }
    */
}
