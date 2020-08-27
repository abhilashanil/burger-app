<?php
    $this->title = 'Burger App - Orders';
?>

<?php 
if ($userOrder->totalCount > 0) {
foreach ($userOrder->models as $model){?>
    <div>
        <div class="order">
            <p>
                Ingredients :
                <span class="order_ingredients">meat</span>
                <span class="order_ingredients">cheese</span>
                <span class="order_ingredients">salad</span>
                <span class="order_ingredients">bacon</span>
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

    