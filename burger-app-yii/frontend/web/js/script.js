function checkForIngredients(ingredient){
    let saladObj = $(".Salad").length;
    let cheeseObj = $(".Cheese").length;
    let baconObj = $(".Bacon").length;
    let meatObj = $(".Meat").length;
    return saladObj || cheeseObj || baconObj || meatObj;    
}

$(".more_salad").click( function() {
    $(".startMessage").hide();
    var saladNode = $('<div class="Salad"></div>');
    $('.Burger_Breadtop').after(saladNode);
    $('.less_salad').removeAttr("disabled");
    $('.BuildControl_OrderButton').removeAttr("disabled");
}); 

$(".less_salad").click( function() {
    if ($(".Salad").length <= 1) {
        $('.less_salad').attr("disabled","true");
    }
    if($(".Salad").length){
       $('.Burger').find('.Salad').first().remove();
    }
    if (!checkForIngredients()) {
        $(".startMessage").show();
        $('.BuildControl_OrderButton').attr("disabled","true");
    }
});

$(".more_cheese").click( function() {
    $(".startMessage").hide();
    var cheeseNode = $('<div class="Cheese"></div>');
    if($(".Salad").length){
        $('.Burger').find('.Salad').last().after(cheeseNode);
    }else{
        $('.Burger_Breadtop').after(cheeseNode);
    }
    $('.less_cheese').removeAttr("disabled");
    $('.BuildControl_OrderButton').removeAttr("disabled");
}); 

$(".less_cheese").click( function() {
    if ($(".Cheese").length <= 1) {
        $('.less_cheese').attr("disabled","true");
    }
    if($(".Cheese").length){
       $('.Burger').find('.Cheese').first().remove();
    }
    if (!checkForIngredients()) {
        $(".startMessage").show();
        $('.BuildControl_OrderButton').attr("disabled","true");
    }
});

$(".more_bacon").click( function() {
    $(".startMessage").hide();
    var baconNode = $('<div class="Bacon"></div>');
    if($(".Meat").length){
        $('.Burger').find('.Meat').last().before(baconNode);
    }else{
        $('.Burger_Breadbottom').before(baconNode);
    }
    $('.less_bacon').removeAttr("disabled");
    $('.BuildControl_OrderButton').removeAttr("disabled");
}); 

$(".less_bacon").click( function() {
    if ($(".Bacon").length <= 1) {
        $('.less_bacon').attr("disabled","true");
    }
    if($(".Bacon").length){
       $('.Burger').find('.Bacon').first().remove();
    }
    if (!checkForIngredients()) {
        $(".startMessage").show();
        $('.BuildControl_OrderButton').attr("disabled","true");
    }
});

$(".more_meat").click( function() {
    $(".startMessage").hide();
    var meatNode = $('<div class="Meat"></div>');
    $('.Burger_Breadbottom').before(meatNode);
    $('.less_meat').removeAttr("disabled");
    $('.BuildControl_OrderButton').removeAttr("disabled");
}); 

$(".less_meat").click( function() {
    if ($(".Meat").length <= 1) {
        $('.less_meat').attr("disabled","true");
    }
    if($(".Meat").length){
       $('.Burger').find('.Meat').first().remove();
    }
    if (!checkForIngredients()) {
        $(".startMessage").show();
        $('.BuildControl_OrderButton').attr("disabled","true");
    }
});