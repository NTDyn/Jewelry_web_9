

 getAllProduct = [];
$(document).ready(function(){
    getListProduct();
})
function formatToMoney(_number){
    let VietNamDong = Intl.NumberFormat('en-VI');
    let result = VietNamDong.format(_number) ;
    return result;
}
function getListProduct(){
    var data = {"action":"getListProduct"};
    $.ajax({
        data: data ,
        type: "post",
        url: "../../route/route_receipt.php",
        success:  function(dataResult){
            dataResult = JSON.parse(dataResult);
            getAllProduct = dataResult;
        }
    })
}

$('.product-item').click(function(){
    $('#modalDetail').modal('show');
    let id = $(this).find('.product-id').val();
    let pr = getAllProduct.find(x=>x.Product_ID == id);
    $('.modal-product-image').attr('src', pr.Product_Image);
    $('.modal-product-name').text(pr.Product_Name);
    $('.modal-product-describe').text(pr.Product_Describe);
    $('.modal-product-price').text(formatToMoney(pr.Product_Price) + " vnd");
    
})

$('.modal-product-add-cart').click(function(){
    Swal.fire({
        title: "Thành công!",
        text: "Sản phẩm đã được thêm vào giỏ hàng!",
        icon: "success",
        timer: 2000,
      });
})