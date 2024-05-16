


$(document).ready(function(){
    getListProduct();
    $('.search-value').attr("value" , localStorage.getItem('searchValue'));
})

let allProductList = [];
function getListProduct(){
    var data = {"action":"getListProduct"};
    $.ajax({
        data: data ,
        type: "post",
        url: "../../route/route_product.php",
        success:  function(dataResult){
            dataResult = JSON.parse(dataResult);
            allProductList = dataResult
            searchProduct();
        }
    })
}

function xoa_dau(str) {
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
    str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
    str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
    str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
    str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
    str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
    str = str.replace(/Đ/g, "D");
    return str;
}

function formatToMoney(_number){
    let VietNamDong = Intl.NumberFormat('en-VI');
    let result = VietNamDong.format(_number) ;
    return result;
}

$(document).on('click','.btn-detail',function(){
    $('#modalDetail').modal('show');
    let id = $(this).closest('.product-item').find('.product-id').val();
    let pr = allProductList.find(x=>x.Product_ID == id);
    // $('.modal-product-image').attr('src', pr.Product_Image);
    // $('.modal-product-name').text(pr.Product_Name);
    // $('.modal-product-describe').text(pr.Product_Describe);
    // $('.modal-product-price').text(formatToMoney(pr.Product_Price) + " vnd");
    var html="";
   
        html+=' <div class="modal-header">'
        html+=  ' <h4 class="modal-title modal-product-name">'+pr.Product_Name+'</h4>'
        html+=  '<button type="button" class="btn-close" data-bs-dismiss="modal"></button>'
        html+= '</div>'

        html+= '<div class="modal-body" >'
        html+= '<div class="row">'
        html+=  '  <div class="col-5">'
        html+=' <img class="modal-product-image" src="'+pr.Product_Image+'">'
        html+=  '</div>'
        html+= '<div class="col-7" >'
        html+= '<div style="font-size: 18px" >Mô tả: <span class="modal-product-describe" >'+pr.Product_Describe+'</span></div>'
        html+=   ' <div class="modal-product-price">'+ formatToMoney(pr.Product_Price)+' vnd</div>'
        html+=   ' <span>Số Lượng</span>'
        html+=' <span > <input name="sl"  class="'+pr.Product_ID+'" type="number" value="1"></span>'
        html+= ' <hr class="modal-line">'
        html+= '<div class="row">'
        html+= '<div class="col-5 "><span class="product-modal-icon fa fa-rotate-left"></span>Đổi miễn phí trong 72 giờ</div>'
        html+=   ' <div class="col-5 "><span class="product-modal-icon fa fa-gittip"></span>Bảo hành trọn đời</div>'
        html+= '</div>'
        html+='<div class="row">'
        html+=   '<div class="col-5 "><span class="product-modal-icon fa fa-handshake-o"></span>Trả góp 0%</div>'
        html+= ' <div class="col-5 "><span class="product-modal-icon fa fa-send"></span>Giao hàng miễn phí toàn quốc</div>'
        html+= ' </div>'
        html+= ' </div>'
        html+= '</div>'
        html+=' </div>'

        html+=' <div class="modal-footer">'
        html+= '<button name="btn_mua" type="button" onclick="add_cart_detail('+pr.Product_ID+')" class="modal-product-add-cart" data-bs-dismiss="modal">Thêm vào giỏ hàng</button>'
        html+= '<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>'
        html+= ' </div>'
        
         document.getElementById("content").innerHTML=html;
    
})
function add_cart_detail(id){
    
   var sl=document.getElementsByClassName(id)[0].value;
   if(sl>10){
    document.getElementById("warning_add_cart").style.display="block";
    setTimeout(show2,800);
   }else{
   $.get ("cart_2.php",{id_sp:id,sl_sp:sl},function(data){
         if(data!=""){
            document.getElementById("warning_add_cart").style.display="block";
            setTimeout(show2,800);
            return;
         }
        document.getElementById("message_add_cart").style.display="block";
        setTimeout(show,800);
    
   
   })
}

}

// $('.modal-product-add-cart').click(function(){
//     Swal.fire({
//         title: "Thành công!",
//         text: "Sản phẩm đã được thêm vào giỏ hàng!",
//         icon: "success",
//         timer: 2000,
//       });
// })

function searchProduct(){
    // let arrSearch = [];
    // let keyword = localStorage.getItem("searchValue");
    // $.each(list, function(k,v){
    //     if(v.Product_Name.includes(keyword)){
    //         arrSearch.push(v);
    //     }
    // })
    // appenProductList(arrSearch);

    let keyword = localStorage.getItem("searchValue");
    let filteredData = [];
    if (keyword != null && keyword.length) {
        filteredData = allProductList
          .filter(item => {
            let startsWithCondition =
              xoa_dau(item.Product_Name).toLowerCase().startsWith(xoa_dau(keyword).toLowerCase());
            let includesCondition =
              xoa_dau(item.Product_Name).toLowerCase().includes(xoa_dau(keyword).toLowerCase());

            if (startsWithCondition) {
              return startsWithCondition
            } else if (!startsWithCondition && includesCondition) {
              return includesCondition
            } else return null
          })

    } else {
        filteredData = allProductList;
    }
    appenProductList(filteredData);
}
function appenProductList(list){
    $('.product-area').empty()
    $.each(list, function(k,v){
        str = '';
        str += '<div class = "col-3 product-item">';
        str += '<input type="hidden" class="product-id" value="' + v.Product_ID + '">';
        str += '<div class="product-grid">';
        str += '<div class="product-image">';
        str += '<a href="#">';
        str += ' <img class="product-picture" src="' + v.Product_Image + '">';
        str += '</a>';
        str += '<ul class="product-links">';
        str += '<li class="btn-detail"><a href="#"  ><i class="fa fa-eye "></i></a></li>';
        // str += ' <li class="btn_add"><a href="cart.php?id_sp='+v.Product_ID+'"><i class="fa fa-shopping-cart" ></i></a></li>';
        str += ' <li class="btn_add"><a onclick=" return  add_cart('+v.Product_ID+')==true"><i class="fa fa-shopping-cart" ></i></a></li>';
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
// $(document).on("click",".btn_add",function(){
//     // document.getElementById("message_add_cart").style.display="block";
//     Swal.fire({
//         title: "Thành công!",
//         text:"thêm sản phẩm",
//         icon: "success",
//         timer: 2000,
//       })
    
// })
function show(){
    document.getElementById("message_add_cart").style.display="none";
    window.location="product.php";
}
function show2(){
    
    document.getElementById("warning_add_cart").style.display="none";
    window.location="product.php";
}
function add_cart(id){

    $.get("cart.php",{id_sp:id},function(data){
        if(data!=""){
            document.getElementById("warning_add_cart").style.display="block";
            setTimeout(show2,800);
            return;
        }
        document.getElementById("message_add_cart").style.display="block";
        setTimeout(show,800);
       
    })
}

