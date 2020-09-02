<?php
    $this->title = 'Burger App - Orders';
?>

<?php 
if ($userOrder->totalCount > 0) {
foreach ($userOrder->models as $model){
    $orderIngredients = $model->getOrderIngredientsList(); ?>
    <div>
        <div class="order">
            <p>
                Ingredients :
                <span class="order_ingredients">meat(<?php echo $orderIngredients->meat;?>)</span>
                <span class="order_ingredients">cheese(<?php echo $orderIngredients->cheese;?>)</span>
                <span class="order_ingredients">salad(<?php echo $orderIngredients->salad;?>)</span>
                <span class="order_ingredients">bacon(<?php echo $orderIngredients->bacon;?>)</span>
            </p>
            <p>
                Price :
                <strong>USD <?php echo $model->total;?></strong>
            </p>
        </div>
    </div>
<?php } } 
else{
    echo "No orders found";
} ?>

    