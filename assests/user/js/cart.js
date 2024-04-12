
$('.plus-btn').click(function(){
   var _qual = parseInt( $(this).closest('.modal-body').find('.quality-product-cart').text());
   
   $('.quality-product-cart').text(plus_quality(_qual));
})

$('.minus-btn').click(function(){
    var _qual = parseInt( $(this).closest('.modal-body').find('.quality-product-cart').text());
    
    $('.quality-product-cart').text(minus_quality(_qual));
 })

function plus_quality(_qual){
    if(_qual < 5){
        _qual += 1;
    }
    return _qual ;
}

function minus_quality(_qual){
    if(_qual >=2){
        _qual -= 1;
    }
    return _qual ;
}

