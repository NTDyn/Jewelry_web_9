$(document).ready(function(){
    //$('#order-table').dataTable();
    readListOrder();

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

 async function appendDetail(list){
    $('.product-order-infor').empty();
    for(let i = 0 ; i < list.length ; i++){
        let name = await getProduct(list[i].Product_ID);
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
async function getProduct(id){
    var _data = {"action": "getProduct", "product-id": id}; 
    let name = '';
    await $.ajax({
        data: _data ,
        type: "post",
        url: "../../route/route_receipt.php",
        success: function(dataResult) {
            //dataResult = JSON.stringify(dataResult);
             name = dataResult;
        }
    })
    return name;
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
