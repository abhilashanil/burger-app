<?php
    $session = Yii::$app->session;
?>
<div class="Burger">
    <div class="Burger_Breadtop">
        <div class="Burger_seed1">
        </div>
        <div class="Burger_seed2">
        </div>
    </div>
    <?php
    if ($session->isActive && $session->has('ingredients')){
        if ($session['ingredients']['salad']){
            for( $i=1;$i<=$session['ingredients']['salad'];$i++ ){
    ?>
    <div class="Salad"></div>
    <?php
            }
        }
        if ($session['ingredients']['cheese']){
            for( $i=1;$i<=$session['ingredients']['cheese'];$i++ ){
    ?>
    <div class="Cheese"></div>
    <?php
            }
        }
        if ($session['ingredients']['bacon']){
            for( $i=1;$i<=$session['ingredients']['bacon'];$i++ ){
    ?>
    <div class="Bacon"></div>
    <?php
            }
        }
        if ($session['ingredients']['meat']){
            for( $i=1;$i<=$session['ingredients']['meat'];$i++ ){
    ?>
    <div class="Meat"></div>
    <?php
            }
        }
    }else{?>
    <p class="startMessage">Please start adding ingredients!!!</p>

    <?php
    }
    ?>
    <div class="Burger_Breadbottom">
    </div>
</div>
