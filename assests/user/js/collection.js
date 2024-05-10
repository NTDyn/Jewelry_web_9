let listProduct = [];

$(document).ready(function(){
    getListProduct();
})

function getListProduct(){
    var data = {"action":"getListProduct"};
    $.ajax({
        data: data,
        type: "post",
        url: "../../route/route_product.php",
        success: function(dataResult){
            dataResult = JSON.parse(dataResult);
           listProduct = dataResult;
            pagination(1);
        }

    });
}

function appenProductList(list){
    $('.product-area').empty()
    $.each(list, function(k,v){
        str = '';
        str += '<div class = "col-3 product-item">';
        str += '<div class="product-grid">';
        str += '<div class="product-image">';
        str += '<a href="#">';
        str += ' <img class="product-picture" src="' + v.Product_Image + '">';
        str += '</a>';
        str += '<ul class="product-links">';
        str += '<li><a href="#"  ><i class="fa fa-eye"></i></a></li>';
        str += ' <li><a href="#"><i class="fa fa-shopping-cart" ></i></a></li>';
        str += ' <li><a href="#" ><i class="fa fa-random"></i></a></li>';
        str += '</ul>';
        str += '</div>';
        str += '<div class="product-content">';
        str += ' <h3 class="title"><a href="#" class="product-name">' + v.Product_Name + '</a></h3>';
        str += ' <div class="price">' + formatToMoney( v.Product_Price )+ ' đ </div>';
        str += '</div>';
        str += '</div>';
        str += '</div>';
        $('.product-area').append(str);
    })

}

$('.page-item').click(function(){
    $(this).addClass('active').siblings('li').removeClass('active');
    let page = parseInt( $(this).text());
    pagination(page);
})
function pagination(page){
    listPro = listProduct.filter(x=>x.Category_ID == 2);
    maxPr = page * 8;
    minPr = maxPr - 8;
    listAppend= [];
    for(i = minPr ; i< maxPr ; i++){
        listAppend.push(listPro[i]);

    }
    appenProductList(listAppend);

}
function formatToMoney(_number){
    let VietNamDong = Intl.NumberFormat('en-VI');
    let result = VietNamDong.format(_number) ;
    return result;
}