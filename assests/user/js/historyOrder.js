let allHistoryOrder = [];
let cus_id = $('#id-order').val();

$(document).ready(function(){
    getAllHistoryOrder(cus_id); 
})
    
function formatToMoney(_number){
    let VietNamDong = Intl.NumberFormat('en-VI');
    let result = VietNamDong.format(_number) ;
    return result;
}

function getAllHistoryOrder(id){
    var _data = {
        "action": "getAllHistoryOrder",
        "Customer_ID": cus_id
    }; 
    $.ajax({
        data: _data ,
        type: "post",
        url: "../../route/route_receipt.php",
       
       success:  function(dataResult){
            dataResult = JSON.parse(dataResult);
           allHistoryOrder = dataResult;
           appendHistoryOrder(allHistoryOrder);
        },
        
        catch: function(dataR){
            console.log(dataR);
        }

    });
}

function appendHistoryOrder(list){
    $('.order-content').empty();
    $.each(list, function(k,v){
        str = '';
        str += '<div class="order-content-item">';
        if(v.Receipt_Status == 0){
            str += ' <div class="order-status" ><span class="fa fa-calendar-times-o cancel-icon" ></span>Đã hủy </div>';
        } else if(v.Receipt_Status == 1){
            str += ' <div class="order-status" ><span class="fa fa-calendar-o wait-icon" ></span>Chờ xác nhận </div>';
        } else if(v.Receipt_Status == 2){
            str += ' <div class="order-status" ><span class="fa fa-dropbox confirm-icon" ></span>Đang chuẩn bị hàng </div>';
        }else if(v.Receipt_Status == 3){
            str += ' <div class="order-status" ><span class="fa fa-truck trans-icon" ></span>Đang giao hàng</div>';
        }else if(v.Receipt_Status == 4){
            str += ' <div class="order-status" ><span class="fa fa-send send-icon" ></span>Giao hàng thành công </div>';
        }
        str += '<div style="padding:1%">'
        str += '<div class="row label-table">';
        str += '<div class="col-1"></div>';
        str += '<div class="col-5">Tên sản phẩm</div>';
        str += '<div class="col-2">Số lượng</div>';
        str += '<div class="col-4">Đơn giá</div>';
        str += '</div >'
        str += '</div>';
        str += '<div id="orderHeader-'+v.Receipt_ID+'"></div>'
        str += '<div class="order-total"> Tổng đơn hàng: <span style = "margin-left:1%">' + formatToMoney(v.Receipt_Total) + ' VND </span> </div>';
        str += '</div>';
        

        $('.order-content').append(str);
        getDetailOrder(v.Receipt_ID);


    })
  
}

function getDetailOrder(id){
    var _data = {
        "action": "getDetailOfReceipt",
        "receipt-id": id
    }; 
    $.ajax({
        data: _data ,
        type: "post",
        url: "../../route/route_receipt.php",
       success:  function(dataResult){
            dataResult = JSON.parse(dataResult);
            let str = '';
            $.each(dataResult, function(k,v){

                str += ' <div class="row" style="margin-bottom: 2%">';
                str += '<div class="col-1 order-image-area">';
                str += ' <image class="order-img" src="' + v.Product_Image +'"></image>';
                str += '</div>';
                str += '<div class="col-5 order-name" style="margin:auto">'+ v.Product_Name + '</div>';
                str += '<div class="col-2 order-quantity" style="margin:auto">' + v.Detail_Quantity + '</div>';
                str += ' <div class="col-4 order-price" style="margin:auto">' + formatToMoney(v.Detail_Price) + ' VND </div>';
                str += '</div>';
            })
            $('#orderHeader-'+id+'').append(str);
           
        },
        
        catch: function(dataR){
            console.log(dataR);
        }

    });
    
}

$('.option-order-item').click(function(){
    $(this).closest('.option-order').find('.active').removeClass('active');
    $(this).find('.option-name').addClass('active');
})

$('#option-wait').click(function(){
    waitOrders = allHistoryOrder.filter(x=>x.Receipt_Status == 1);
    appendHistoryOrder(waitOrders);
})
$('#option-cancel').click(function(){
    cancelOrders = allHistoryOrder.filter(x=>x.Receipt_Status == 0);
    appendHistoryOrder(cancelOrders);
})
$('#option-all').click(function(){
    appendHistoryOrder(allHistoryOrder);
})
$('#option-confirm').click(function(){
    confirmOrders = allHistoryOrder.filter(x=>x.Receipt_Status == 2);
    appendHistoryOrder(confirmOrders);
})
$('#option-trans').click(function(){
    transOrders = allHistoryOrder.filter(x=>x.Receipt_Status == 3);
    appendHistoryOrder(transOrders);
})