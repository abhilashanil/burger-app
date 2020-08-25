ingredients = {
    salad : 0,
    cheese : 0,
    bacon : 0,
    meat : 0
}

function checkForIngredients(ingredient){
    let saladObj = $(".Salad").length;
    let cheeseObj = $(".Cheese").length;
    let baconObj = $(".Bacon").length;
    let meatObj = $(".Meat").length;
    return saladObj || cheeseObj || baconObj || meatObj;    
}

function calculateTotalPrice(ingredient,type){
    $.ajax('/burger/ingredient', {
        type: 'POST',
        data: { ingredient: ingredient },
        success: function (data, status, xhr) {
            let currentPrice = $(".BuildControl .price").text();
            if(type == 'more'){
                var newPrice = Number(currentPrice) + Number(data.price);
            }else{
                var newPrice = Number(currentPrice) - Number(data.price);
            }
            $(".BuildControl .price").text(newPrice.toFixed(2))
        },
        error: function (jqXhr, textStatus, errorMessage) {
            console.log('Error' + errorMessage);
        }
    });
}

$(".more_salad").click( function() {
    $(".startMessage").hide();
    var saladNode = $('<div class="Salad"></div>');
    $('.Burger_Breadtop').after(saladNode);
    $('.less_salad').removeAttr("disabled");
    $('.BuildControl_OrderButton').removeAttr("disabled");
    ingredients['salad']++;
    calculateTotalPrice('Salad','more');
});


$(".less_salad").click( function() {
    if ($(".Salad").length <= 1) {
        $('.less_salad').attr("disabled","true");
    }
    calculateTotalPrice('Salad','less');
    if($(".Salad").length){
       $('.Burger').find('.Salad').first().remove();
    }
    if (!checkForIngredients()) {
        $(".startMessage").show();
        $('.BuildControl_OrderButton').attr("disabled","true");
    }
    ingredients['salad']--;
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
    ingredients['cheese']++;
    calculateTotalPrice('Cheese','more');
}); 

$(".less_cheese").click( function() {
    if ($(".Cheese").length <= 1) {
        $('.less_cheese').attr("disabled","true");
    }
    calculateTotalPrice('Cheese','less');
    if($(".Cheese").length){
       $('.Burger').find('.Cheese').first().remove();
    }
    if (!checkForIngredients()) {
        $(".startMessage").show();
        $('.BuildControl_OrderButton').attr("disabled","true");
    }
    ingredients['cheese']--;
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
    ingredients['bacon']++;
    calculateTotalPrice('Bacon','more');
}); 

$(".less_bacon").click( function() {
    if ($(".Bacon").length <= 1) {
        $('.less_bacon').attr("disabled","true");
    }
    calculateTotalPrice('Bacon','less');
    if($(".Bacon").length){
       $('.Burger').find('.Bacon').first().remove();
    }
    if (!checkForIngredients()) {
        $(".startMessage").show();
        $('.BuildControl_OrderButton').attr("disabled","true");
    }
    ingredients['bacon']--;
});

$(".more_meat").click( function() {
    $(".startMessage").hide();
    var meatNode = $('<div class="Meat"></div>');
    $('.Burger_Breadbottom').before(meatNode);
    $('.less_meat').removeAttr("disabled");
    $('.BuildControl_OrderButton').removeAttr("disabled");
    ingredients['meat']++;
    calculateTotalPrice('Meat','more');
}); 

$(".less_meat").click( function() {
    if ($(".Meat").length <= 1) {
        $('.less_meat').attr("disabled","true");
    }
    calculateTotalPrice('Meat','less');
    if($(".Meat").length){
       $('.Burger').find('.Meat').first().remove();
    }
    if (!checkForIngredients()) {
        $(".startMessage").show();
        $('.BuildControl_OrderButton').attr("disabled","true");
        ingredients['meat']--;
    }
});

$(document).on('show.bs.modal', '#orderConfirmationModal', function (e) {
    $('#li-salad').text(ingredients['salad']);
    $('#li-cheese').text(ingredients['cheese']);
    $('#li-bacon').text(ingredients['bacon']);
    $('#li-meat').text(ingredients['meat']);
    var totalPrice = $("#current-price").text();
    $('#total-price').text(totalPrice);
});

$('#orderConfirmationModal #modal-continue').click( function(){
    $.ajax({
        method: "POST",
        url: "/burger/set-ingredients",
        data: {'ingredients' : ingredients},
        success: function (data, status, xhr) {
            window.location="/burger/checkout";
        },
        error: function (jqXhr, textStatus, errorMessage) {
            console.log('Error' + errorMessage);
        }
      })
});

$(".checkoutCancel").click( function() {
    $.ajax({
        method: "POST",
        url: "/burger/unset-ingredients",
        success: function (data, status, xhr) {
            window.location="/burger/index";
        },
        error: function (jqXhr, textStatus, errorMessage) {
            console.log('Error' + errorMessage);
        }
      })
});