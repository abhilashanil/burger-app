<?php


?>
<div class="BuildControl">
   <p>Current Price : <span class="price" id="current-price">4.00</span></p>
   <div class="Build">
      <div class="Build_Label">Salad</div>
      <button class="Build_Less less_salad" disabled="">Less</button>
      <button class="Build_More more_salad">More</button>
    </div>
    <div class="Build">
      <div class="Build_Label">Cheese</div>
      <button class="Build_Less less_cheese" disabled="">Less</button>
      <button class="Build_More more_cheese">More</button>
    </div>
    <div class="Build">
      <div class="Build_Label">Bacon</div>
      <button class="Build_Less less_bacon" disabled="">Less</button>
      <button class="Build_More more_bacon">More</button>
    </div>
    <div class="Build">
      <div class="Build_Label">Meat</div>
      <button class="Build_Less less_meat" disabled="">Less</button>
      <button class="Build_More more_meat">More</button>
    </div>
    <button class="BuildControl_OrderButton" disabled="" data-toggle="modal" data-target="#myModal"> <?= Yii::$app->user->isGuest ? 'SIGN UP FOR ORDER': 'ORDER NOW' ?></button>

     <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content margin30">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Your Order</h3>
        </div>
        <div class="modal-body">
          <h5>A delicious burger with following ingredients :</h5>
          <ul>
            <li>Salad :  <span id="li-salad">0</span>  </li>
            <li>Cheese : <span id="li-cheese">0</span>  </li>
            <li>Bacon :  <span id="li-bacon">0</span>  </li>
            <li>Meat :   <span id="li-meat">0</span>  </li>
          </ul>
          <h4>Total Price :<span id="total-price">0</span> </h4>
          <p>Continue to Checkout?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="modal-btn cancel" data-dismiss="modal">CANCEL</button>
          <button type="button" class="modal-btn continue" id="modal-continue">CONTINUE</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>