
function updateMin(val) {
    document.getElementById('min_price').innerHTML=val; 
    var max_value = document.getElementById("max_price_range").value;
    document.getElementById("min_price_range").setAttribute("max", max_value);
}
function updateMax(val) {
    document.getElementById('max_price').innerHTML=val; 
    var min_value = document.getElementById("min_price_range").value;
    document.getElementById("max_price_range").setAttribute("min", min_value);
}
function change_price(){
    document.getElementById('price_range').submit();
}
function goBack(){
    // window.history.back(); 
    document.getElementsByClassName("view_mode_stock_display").style.display = "none";
}

// function add_to_cart_function(){
//     var stock_id = document.getElementById("stock_id").value
//     var stock_type = document.getElementById("stock_type").value
//     var quantity_order = document.getElementById("quantity_order").value

//     var add_to_cart_stock = stock_type + "_No_" + stock_id

//     sessionStorage.setItem(add_to_cart_stock, quantity_order)
//     //console.log (quantity_order);
// }