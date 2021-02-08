if (document.readyState == 'loading'){
  document.addEventListener('DOMContentLoaded', ready)
}
else{
  ready()
}

function ready(){
  var inputQty = document.getElementsByClassName('cart-quantity-input')
  for (var i=0; i < inputQty.length; i++){
    var input = inputQty[i]
    input.addEventListener('change',cart_item_update)
  }
}


function cart_item_update(event){
  var input = event.target
  if (isNaN(input.value)|| input.value <=0){
    input.value=1
  }
  var item_qty_box = document.getElementsByClassName('cart-quantity-input')
    var i=event.target.id;
    var qty = item_qty_box[i].value
    var user_id = document.getElementsByClassName('user_id_js')[i].innerHTML
    var item_id = document.getElementsByClassName('item_id_js')[i].innerHTML
    window.location.href="cart_item_update.php?item_id=" +item_id + "&user_id=" +user_id+"&qty="+qty;
    
}
