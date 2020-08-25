<?php
    $this->title = 'Burger App - Checkout';
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
      <form>
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
         </form>
   </div>
</div>