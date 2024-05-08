let ProductList =[];

$(document).ready(function(){
    //$('#order-table').dataTable();
    readListOrder();
    getListProduct();
})

function readListOrder(){
    var _data = {"action": "read"}; 
    $.ajax({
        data: _data ,
        type: "post",
        url: "../../route/route_receipt.php",
       
       success:  function(dataResult){
            dataResult = JSON.parse(dataResult);
           appendListOrder(dataResult);
           $('#order-table').dataTable();
        },
        
        catch: function(dataR){
            console.log(dataR);
        }
    })
}

function appendListOrder(data){
    
    $('#list-order').empty();
    $.each(data, function(k,v){
        str = "";
        str += "<tr class='order-item'>";
        str += "<td class='order-id'>" + v.Receipt_ID + "</td>";
        str += "<td class='customer-id'>" + v.Customer_ID + "</td>";
        str += "<td class='order-total'>" + formatToMoney(v.Receipt_Total) + " đ </td>";
        str += "<td class='order-date'>" + v.Receipt_Date + "</td>";

        if(v.Receipt_Status == 0){
            str += "<td class='order-status' style='color: red ; font-weight:bold'>  Đã hủy </td>";
        } else if(v.Receipt_Status == 1){
            str += "<td class='order-status'>  Chờ xác nhận</td>";
        } else if( v.Receipt_Status == 2){
            str += "<td class='order-status'>  Xác nhận</td>";
        } else if( v.Receipt_Status == 3) {
            str += "<td class='order-status'>  Đang giao hàng</td>";
        } else if(v.Receipt_Status == 4) {
            str += "<td class='order-status'  style='color: #00c851 ; font-weight:bold'>  Đã nhận</td>";
        }
        str += "<td>"
            if(v.Receipt_Status ==2 ){
                modal = '#modalDelivered';
            } else if(v.Receipt_Status == 3){
                modal = '#modalReceived';
            }
            if(v.Receipt_Status == 1){
                str += ' <button  class="btn-detail" data-bs-toggle="modal" data-bs-target="#modalDetail" >';
                str += '<span class="fa fa-eye " ></span>';
                str += '</button>';
                str += ' <button class="btn-next" type="button" data-bs-toggle="modal" data-bs-target="#modalConfirm" >';
                str += '<span class=" fa fa-check"></span>';
                str += '</button>';
                str += ' <button class="btn-cancel" type="button" data-bs-toggle="modal" data-bs-target="#modalCancel" >';
                str += '<span class="fa fa-trash"></span>';
                str += '</button>';
            } 
            else if(v.Receipt_Status == 2 || v.Receipt_Status == 3 ){
                str += ' <button  class="btn-detail" data-bs-toggle="modal" data-bs-target="#modalDetail" >';
                str += '<span class="fa fa-eye " ></span>';
                str += '</button>';
                str += ' <button class="btn-next" type="button" data-bs-toggle="modal" data-bs-target="' + modal +'" >';
                str += '<span class=" fa fa-check"></span>';
                str += '</button>';
                str += ' <button class="btn-cancel-disabled" type="button" data-bs-toggle="modal" data-bs-target="#modalCancel" disabled >';
                str += '<span class="fa fa-trash"></span>';
                str += '</button>';
            } else if(v.Receipt_Status == 4 || v.Receipt_Status == 0){
                str += ' <button  class="btn-detail" data-bs-toggle="modal" data-bs-target="#modalDetail" >';
                str += '<span class="fa fa-eye " ></span>';
                str += '</button>';
                str += ' <button class="btn-next-disabled" type="button" data-bs-toggle="modal" disabled> ';
                str += '<span class=" fa fa-check"></span>';
                str += '</button>';
                str += ' <button class="btn-cancel-disabled" type="button" data-bs-toggle="modal" data-bs-target="#modalCancel" disabled >';
                str += '<span class="fa fa-trash"></span>';
                str += '</button>';
            }
        str += "</td>"
        str += "</tr>";

        $('#list-order').append(str);
       
    })

}

$(document).on('click', '.btn-detail', function(){
    let customer_id = $(this).closest('.order-item').find('.customer-id').text();
    getCustomer(customer_id);
    let receipt_id = $(this).closest('.order-item').find('.order-id').text();
    $('#receipt-id').text(receipt_id);
    let receipt_date =  $(this).closest('.order-item').find('.order-date').text();
    $('#receipt-date').text(receipt_date);
    let receipt_total =  $(this).closest('.order-item').find('.order-total').text();
    $('#receipt-total').text(receipt_total);
    getDetailOfReceipt(receipt_id);
})

function getCustomer(id){
    var _data = {"action": "getCustomer", "customer-id": id}; 
    $.ajax({
        data: _data ,
        type: "post",
        url: "../../route/route_receipt.php",
        success:  function(dataResult){
            dataResult = JSON.parse(dataResult);
            $('#customer-id').text(dataResult.Customer_ID);
            $('#customer-name').text(dataResult.Customer_Name);
            $('#customer-address').text(dataResult.Customer_Address);
            $('#customer-phone').text(dataResult.Customer_Phone);
        }
    })
}

function getDetailOfReceipt(id_receipt){
    var _data = {"action": "getDetailOfReceipt", "receipt-id": id_receipt}; 
    $.ajax({
        data: _data ,
        type: "post",
        url: "../../route/route_receipt.php",
        success:  function(dataResult){
            dataResult = JSON.parse(dataResult);
            appendDetail(dataResult);

        }
    })
}

function appendDetail(list){
    $('.product-order-infor').empty();
    
    for(let i = 0 ; i < list.length ; i++){
        let pr = ProductList.find(x=>x.Product_ID == list[i].Product_ID);
        let name = pr.Product_Name;
        list[i]["Product_Name"] = name;
        appendInforDetail(list[i]);
       
    }
    
}
function appendInforDetail(data){
        str = '';
        str += '<div class="row detail-item">';
        str += '<div class="col-3">';
        str += ' <span  id= "product-id" >' + data.Product_ID + '</span>';
        str += '</div>';
        str += '<div class="col-3">';
        str += '<span id= "product-name">' + data.Product_Name + '</span>';
        str += '</div>';
        str += ' <div class="col-3">';
        str += ' <span id= "product-price">' + formatToMoney(data.Detail_Price) + ' đ </span>';
        str += '</div>';
        str += ' <div class="col-3">';
        str += ' <span id= "product-quantity">' + data.Detail_Quantity + '</span>';
        str += ' </div>';
        str += ' </div>';
        $('.product-order-infor').append(str);
        $('#order-note').text(data.Receipt_Note);
        
}

$(document).on('click', '.btn-next', function(){
    let id = $(this).closest('.order-item').find('.order-id').text();
    $('#id-confirm').text(id);
    $('#id-delivered').text(id);
    $('#id-received').text(id);

})

$(document).on('click', '.btn-confirm', function(){
    confirmOrder();
    readListOrder();
})

function confirmOrder(){
    let id = parseInt($('#id-confirm').text());
    var _data = {"action": "confirm", "receipt-id": id}; 
    $.ajax({
        data: _data ,
        type: "post",
        url: "../../route/route_receipt.php",
        success:  function(dataResult){

            dataResult = JSON.parse(dataResult);
            if(dataResult == true){
                Swal.fire({
                    title: "Thành công!",
                    text: "Cập nhật trạng thái đơn hàng thành công!",
                    icon: "success",
                    timer: 2000,
                  });
                  readListOrder();
            }
            

        }
    })
}

$(document).on('click', '.btn-delivered', function(){
    deliveredOrder();
   
})

function deliveredOrder(){
    let id = parseInt($('#id-delivered').text());
    var _data = {"action": "delivered", "receipt-id": id}; 
    $.ajax({
        data: _data ,
        type: "post",
        url: "../../route/route_receipt.php",
        success:  function(dataResult){
            dataResult = JSON.parse(dataResult);
            if(dataResult == true){
                Swal.fire({
                    title: "Thành công!",
                    text: "Cập nhật trạng thái đơn hàng thành công!",
                    icon: "success",
                    timer: 2000,
                  });
                  readListOrder();
            }
            

        }
    })
}

$(document).on('click', '.btn-received', function(){
    receivedOrder();
   
})

function receivedOrder(){
    let id = parseInt($('#id-received').text());
    var _data = {"action": "received", "receipt-id": id}; 
    $.ajax({
        data: _data ,
        type: "post",
        url: "../../route/route_receipt.php",
        success:  function(dataResult){
            dataResult = JSON.parse(dataResult);
            if(dataResult == true){
                Swal.fire({
                    title: "Thành công!",
                    text: "Cập nhật trạng thái đơn hàng thành công!",
                    icon: "success",
                    timer: 2000,
                  });
                  readListOrder();
            }
            

        }
    })
}

$(document).on('click', '.btn-cancel', function(){
    let id = $(this).closest('.order-item').find('.order-id').text();
    $('#id-cancel').text(id);
})

$(document).on('click', '.btn-cancel-order', function(){
    cancelOrder();
   
})

function cancelOrder(){
    let id = parseInt($('#id-cancel').text());
    var _data = {"action": "cancel", "receipt-id": id}; 
    $.ajax({
        data: _data ,
        type: "post",
        url: "../../route/route_receipt.php",
        success:  function(dataResult){
            dataResult = JSON.parse(dataResult);
            if(dataResult == true){
                Swal.fire({
                    title: "Thành công!",
                    text: "Đơn hàng đã được hủy!",
                    icon: "success",
                    timer: 2000,
                  });
                  readListOrder();
            }
            

        }
    })
}

function formatToMoney(_number){
    let VietNamDong = Intl.NumberFormat('en-VI');
    let result = VietNamDong.format(_number) ;
    return result;
}

  function existCustomer(){
    let phone = $('#txt-phone').val();
    var data = {"action":"existCustomer", "customer-phone": phone};
    $.ajax({
        data: data ,
        type: "post",
        url: "../../route/route_receipt.php",
        success:  function(dataResult){
            $('.error-notify').text('');
            
            if(dataResult == 'false'){
                $('.isDisable').prop('disabled', false);
                $('#txt-name').val("");
                $('#txt-address').val("");
                $('#txt-email').val("");
            } else {
                dataResult = JSON.parse(dataResult);
                $('#txt-name').val(dataResult.Customer_Name);
                $('#txt-address').val(dataResult.Customer_Address);
                $('#txt-email').val(dataResult.Customer_Email);
                $('.isDisable').prop('disabled', true);
            }
            
        }
    })
  }
  function checkCustomerInfor(){
    var data = $("#checkCustomer_form").serialize();
    $.ajax({
        data: data ,
        type: "post",
        url: "../../route/route_receipt.php",
        success:  function(dataResult){
            $('.error-notify').text('');
            dataResult = JSON.parse(dataResult);
            $.each(dataResult, function(k,v){
                
                if(v.Status == 0){
                    errorInnerHTML(v);
                }
                if(v.Status == 200){
                    getListProduct();

                }
            })
        }
    })
}

function errorInnerHTML(valid){
  

    if(valid.Subject == "Customer_Empty"){
        $('.error-main').text(valid.Message);
    }

    if(valid.Subject == "Customer_Name"){
        $('.error-name').text(valid.Message);
    }

    if(valid.Subject == "Customer_Phone"){
        $('.error-phone').text(valid.Message);
    }

    if(valid.Subject == "Customer_Address"){
        $('.error-address').text(valid.Message);
    }

    if(valid.Subject == "Customer_Email"){
        $('.error-email').text(valid.Message);
    }

    if(valid.Subject == "Customer_Username"){
        $('.error-username').text(valid.Message);
    } 
}

function getListProduct(){
    var data = {"action":"getListProduct"};
    $.ajax({
        data: data ,
        type: "post",
        url: "../../route/route_receipt.php",
        success:  function(dataResult){
            dataResult = JSON.parse(dataResult);
            ProductList = dataResult;
            innerProductList(ProductList);
        }
    })
    $('#tb-selected-product').dataTable();
}

function innerProductList(dataList){
   
    $.each(dataList, function(k,v){
        str = "";
       str += '<option class="product-option" value = "' + v.Product_ID+ '" > ' + v.Product_Name + '</option>';
        $('.select2-show-search').append(str);
    })
}

$(document).on('click', '.choose-product', function(e){
    let id = $(this).closest('.product-item').find('.product-id').text();
    let name = $(this).closest('.product-item').find('.product-name').text();
    let price = $(this).closest('.product-item').find('.product-price').text();
    let img= $(this).closest('.product-item').find('.product-img').attr('src');

    let str = '';
        str += '<div class = "row">'
        str += '<div class="col-1 ">';
        str += '<img class="product-img" src = "' + img + '" >';
        str += '</div>';
        str += '<div class = "col-3 product-name">'+ name + "</div>"
        str += '<div class="col-2 product-price">' + price + "</div>";
        str += '<div class = "col-2">'
        str += '<span class ="fa fa-minus"></span>';
        str += '<span class ="">1</span>';
        str += '<span class ="fa fa-plus"></span>';
        str +=  '</div>';
        str += '<div class="col-2">';
        str += '<button class="fa fa-trash" ></button>';
        str += '</div>';
        str += '</div>';
    e.preventDefault();
     $('.product-cart').append(str);
     
})

$('#txt-phone').bind("enterKey",function(e){
    $('.isVisible').css('display','block');
    existCustomer();
 });
 $('#txt-phone').keyup(function(e){
     if(e.keyCode == 13)
     {
         $(this).trigger("enterKey");
     }
 });

$('#fix-selection').change(function(){
    let id = $(this).val();

    let findID = $('.selected-product option[value = '+ id + ']').filter(':selected');
    if(findID.length !== 0){
        let quantity =  findID.closest('.cart-item').find('.product-quantity');
        let number = parseInt(quantity.text()) + 1;
        quantity.text(number);
        
    } else{
        innerSelectedProduct(id);
        let total_quantity = parseInt($('#total-quantity').text()) + 1;
        $('#total-quantity').text(total_quantity)
    }
    let pr = ProductList.find(x=>x.Product_ID == id);
    $(this).val("");
    totalPrice(pr.Product_Price);
})

 function innerSelectedProduct(id){
    let pr =  ProductList.find(x=> x.Product_ID == id);
    let price = pr.Product_Price;
    str = '';
    str += '<tr class="cart-item">';
    str += '<td class="product-image-area">';
    str += '<img class="product-image" src = "' + pr.Product_Image + '" >';
    str += '</td>';
    str += '<td>';
    str += ' <select class="form-control select2-show-search selected-product" style="width: 100%"  >';
    
    $.each(ProductList, function(k,v){
        if(v.Product_ID == id){
            str += '  <option  selected hidden value= "' + id + '">' + v.Product_Name + '</option>';
        }
       str += '<option class="product-option" value = "' + v.Product_ID+ '" > ' + v.Product_Name + '</option>';
    })
    str += '</select>';
    str += '</td>';
    str += ' <td class="product-price">' + formatToMoney( price) + '</td>';
    str += '<td class="product-quantity-area">';
    str += '<button class="fa fa-minus btn-minus" </button>';
    str += '<span class="product-quantity">1</span>' ;
    str += '<button class="fa fa-plus btn-plus" </button>';
    str += '</td>';
    str += '<td>';
    str += '<button class = "fa fa-trash btn-trash-product"></button>'
    str += '</td>';
    str += '</tr>';
    $('#tb-product-body').append(str);
}

$(document).on('change', '.selected-product',  function(){
    let id = $(this).val();
    let pr =  ProductList.find(x=> x.Product_ID == id);
    let price = pr.Product_Price;
    $(this).closest('.cart-item').find('.product-price').text(formatToMoney(price) + " VND");
    let img = pr.Product_Image;
    $(this).closest('.cart-item').find('.product-image').attr('src',img);

})

$(document).on('click', '.btn-plus',  function(){
    let quantity = parseInt($(this).closest('.cart-item').find('.product-quantity').text());
    let id = parseInt($(this).closest('.cart-item').find('.selected-product').val());
    number = _plusQuantity(id, quantity );
    $(this).closest('.cart-item').find('.product-quantity').text(number);
})

$(document).on('click', '.btn-minus', function(){
    let id = parseInt($(this).closest('.cart-item').find('.selected-product').val());
    let quantity = parseInt($(this).closest('.cart-item').find('.product-quantity').text());
    number = _minusQuantity(id,quantity);
    $(this).closest('.cart-item').find('.product-quantity').text(number);
})

function _plusQuantity(id, quantity ){
    let pr = ProductList.find(x => x.Product_ID == id);
    let maxQuanlity = pr.Product_Quality;
    if(quantity == maxQuanlity){
        _qlt = quantity;
        return _qlt;
    } else {
        _qlt = quantity + 1;
        let total_quantity = parseInt($('#total-quantity').text()) + 1;
        $('#total-quantity').text(total_quantity)
        totalPrice(pr.Product_Price);
        return _qlt;
    }

}
 function _minusQuantity( id,quantity ){
    let pr = ProductList.find(x=> x.Product_ID == id);
    if(quantity == 1){
        _qlt = quantity;
        return _qlt;
    } else {
        _qlt = quantity - 1;
        let total_quantity = parseInt($('#total-quantity').text()) - 1;
        $('#total-quantity').text(total_quantity);
        let oldPrice = parseInt(formatFromMoney($('#total-price').text()));
        total = oldPrice - pr.Product_Price;
        $('#total-price').text(formatToMoney(total) + " VND");
        return _qlt;
    }

}

$(document).on('click', '.btn-trash-product', function(){
    let id= $(this).closest('.cart-item').find('.selected-product').val();
    let pr = ProductList.find(x=>x.Product_ID == id);
    let price = pr.Product_Price;
    let quantity = $(this).closest('.cart-item').find('.product-quantity').text();
    let minus = price * quantity;
    let oldPrice = parseInt(formatFromMoney($('#total-price').text()));
    total = oldPrice - minus
    $('#total-price').text(formatToMoney(total));
    $(this).closest('.cart-item').remove();

})

function formatFromMoney(_number){
    let integerNumber = _number.replaceAll(",","");
    return integerNumber;
}

function totalPrice(addPrice){
    form = formatFromMoney($('#total-price').text());
   let oldPrice = parseInt(form);
   total = oldPrice + addPrice;
   $('#total-price').text(formatToMoney(total) + " VND");
}

$('.btn-order').click(function(){
    Swal.fire({
        title: "Bạn có chắc chắn?",
        text: "Bạn có chắc chắn muốn thêm đơn hàng?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#00c851",
        cancelButtonColor: "#d33",
        confirmButtonText: "Thêm đơn hàng"
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: "Thành công!",
            text: "Đã thêm đơn hàng thành công.",
            icon: "success"
          });
        }
      });
})