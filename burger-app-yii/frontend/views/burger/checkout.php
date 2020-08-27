<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Burger App - Checkout';
$session = Yii::$app->session;
?>

<div class="CheckoutSummary">
   <h1>We hope it tastes well!</h1>
<?php
   echo $this->render('preview');
?>
<div>
   <div class="CheckoutSummary">
      <h1>We hope it tastes well!</h1>
      <div class="CheckoutSummary_BurgerContainer">
         <button class="checkoutButton Button_Danger checkoutCancel">CANCEL</button>
         <button class="checkoutButton Button_Success checkoutContinue">CONTINUE</button>
      </div>
   </div>
   <div class="ContactData">
      <h4>Enter your Contact Details</h4>

      <?php
      $form = ActiveForm::begin([
         'id' => 'checkout-form'
      ]) ?>
      <div class="Input_Input">
         <?= $form->field($model, 'name')->textInput(['maxlength' => true])->input('', ['placeholder' => "Your Name"])->label(false); ?>
      </div>
      <div class="Input_Input">
         <?= $form->field($model, 'street')->textInput(['maxlength' => true])->input('', ['placeholder' => "Street"])->label(false); ?>
      </div>
      <div class="Input_Input">
         <?= $form->field($model, 'city')->textInput(['maxlength' => true])->input('', ['placeholder' => "City"])->label(false); ?>
      </div>
      <div class="Input_Input">
         <?= $form->field($model, 'zipcode')->textInput(['type' => 'number','maxlength' => true])->input('', ['placeholder' => "ZIP Code"])->label(false); ?>
      </div>
      <div class="Input_Input">
         <?= $form->field($model, 'country')->textInput(['maxlength' => true])->input('', ['placeholder' => "Country"])->label(false); ?>
      </div>
      <div class="Input_Input">
         <?= $form->field($model, 'state')->textInput(['maxlength' => true])->input('', ['placeholder' => "State"])->label(false); ?>
      </div>
      <div class="Input_Input">
         <?= $form->field($model, 'email')->input('email', ['placeholder' => "Your E-mail"])->label(false); ?>
      </div>
      <div class="Input_Input">
         <?php $options= ['fastest' => 'Fastest', 'cheapest' => 'Cheapest'];?>
         <?= $form->field($model, 'delivery_mode')->dropDownList($options,['prompt'=>'Select Delivery Mode'])->label(false); ?>
      </div>
      <?php
         if ($session->isActive && $session->has('orderTotal')){
            $orderTotal = $session['orderTotal'];
         }
      ?>
      <?= Html::activeHiddenInput($model, 'total', array('value'=>$orderTotal)) ;?>

      <?= Html::submitButton('Order', ['class' => 'checkoutButton Button_Success']) ?>
      <?php ActiveForm::end() ?>

      <!-- <form>
         <div class="Input_Input">
            <label class="Input_Label"></label>
            <input class="Input_Element" type="text" placeholder="Your Name" value="">
         </div>
         <div class="Input_Input">
            <label class="Input_Label"></label>
            <input class="Input_Element" type="text" placeholder="Street" value="">
         </div>
         <div class="Input_Input">
            <label class="Input_Label"></label>
            <input class="Input_Element" type="text" placeholder="City" value="">
         </div>
         <div class="Input_Input">
            <label class="Input_Label"></label>
            <input class="Input_Element" type="text" placeholder="ZIP Code" value="">
         </div>
         <div class="Input_Input">
            <label class="Input_Label"></label>
            <input class="Input_Element" type="text" placeholder="Country" value="">
         </div>
         <div class="Input_Input">
            <label class="Input_Label"></label>
            <input class="Input_Element" type="text" placeholder="State" value="">
         </div>
         <div class="Input_Input">
            <label class="Input_Label"></label>
            <input class="Input_Element" type="email" placeholder="Your E-Mail" value="">
         </div>
         <div class="Input_Input">
            <label class="Input_Label"></label>
         <select class="Input_Element">
            <option value="fastest">Fastest</option>
            <option value="cheapest">Cheapest</option>
         </select>
         </div>
         <button class="Button Button_Success">ORDER</button>
         </form> -->
   </div>
</div>