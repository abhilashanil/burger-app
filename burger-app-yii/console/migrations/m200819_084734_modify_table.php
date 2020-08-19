<?php

use yii\db\Migration;

/**
 * Class m200819_084734_modify_table
 */
class m200819_084734_modify_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //Insert values to ingredients
        $this->insert('ingredients', [
            'id' => 1,
            'name' => 'Salad',
            'price' => 1.00, 
            'qty' => 100
        ]);
        $this->insert('ingredients', [
            'id' => 2,
            'name' => 'Cheese',
            'price' => 2.00, 
            'qty' => 100
        ]);
        $this->insert('ingredients', [
            'id' => 3,
            'name' => 'Bacon',
            'price' => 3.00, 
            'qty' => 100
        ]);
        $this->insert('ingredients', [
            'id' => 4,
            'name' => 'Meat',
            'price' => 4.00, 
            'qty' => 100
        ]);
        
        // Add customer order details to order table
        $this->addColumn('orders', 'name', $this->string(255));
        $this->addColumn('orders', 'street', $this->string(255));
        $this->addColumn('orders', 'city', $this->string(255));
        $this->addColumn('orders', 'zipcode', $this->integer());
        $this->addColumn('orders', 'country', $this->string(255));
        $this->addColumn('orders', 'state', $this->string(255));
        $this->addColumn('orders', 'email', $this->string(255));
        $this->addColumn('orders', 'delivery_mode', $this->string(255));

        // Add coloumns to order_ingredients table
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
        echo "m200819_084734_modify_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200819_084734_modify_table cannot be reverted.\n";

        return false;
    }
    */
}
