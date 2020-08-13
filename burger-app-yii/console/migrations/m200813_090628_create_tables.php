<?php

use yii\db\Migration;

/**
 * Class m200813_090628_create_tables
 */
class m200813_090628_create_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Create ingredients table
        $this->createTable('ingredients' ,[
            'id' => $this->primaryKey(),
            'name' => $this->string(100),
            'price' => $this->double(), 
            'qty' => $this->integer()
        ]);

        // Create orders table
        $this->createTable('orders' ,[
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'date' => $this->date(), 
            'total' => $this->double()
        ]);

        // Create orders table
        $this->createTable('order_ingredients' ,[
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(),
            'ingredient_id' => $this->integer(), 
            'qty' => $this->integer()
        ]);
        
        // Add coloumn name to user table
        $this->addColumn('user', 'name', $this->string(255));

        //Add foreignKey orders-user
        $this->addForeignKey('fk_orders_user', 'orders', 'user_id', 'user', 'id');

        //Add foreignKey order_ingredients-order
        $this->addForeignKey('fk_orderIngredients_order', 'order_ingredients', 'order_id', 'orders', 'id');

        //Add foreignKey order_ingredients-ingredients
        $this->addForeignKey('fk_orderIngredients_ingredients', 'order_ingredients', 'ingredient_id', 'ingredients', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200813_090628_create_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200813_090628_create_tables cannot be reverted.\n";

        return false;
    }
    */
}
