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
    console.log(list)
    $.each(list, function(k,v){
        str = '';
        str += '<div class="order-content-item">';
        str += ' <div class="order-status" ><span class="fa fa-send send-icon" ></span>Giao hàng thành công || Hoàn thành</div>';
        str += '<div class="row label-table">';
        str += '<div class="col-1"></div>';
        str += '<div class="col-5">Tên sản phẩm</div>';
        str += '<div class="col-2">Số lượng</div>';
        str += '<div class="col-3">Đơn giá</div>';
        str += '</div >'
        str += '<div id="orderHeader-'+v.Receipt_ID+'"></div>'
        str += '<div class="order-total"> Tổng đơn hàng: <span style = "margin-left:1%">' + formatToMoney(v.Receipt_Total) + ' VND </span> </div>';
        str += '</div>';
       

        $('.order-content').append(str);
        getDetailOrder(v.Receipt_ID);


    })
    // item = [];
    // item = getDetailOrder(2);
    // console.log(item)
    // //alert((item));
    // i = item.find(x=>x.Receipt_ID == 2);
    // console.log(item[0].Receipt_ID);
}

function getDetailOrder(id){
    let result = []; 
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

                str += ' <div class="row">';
                str += '<div class="col-1 order-image-area">';
                str += ' <image class="order-img" src="' + v.Product_Image +'"></image>';
                str += '</div>';
                str += '<div class="col-5 order-name" style="margin:auto">'+ v.Product_Name + '</div>';
                str += '<div class="col-2 order-quantity" style="margin:auto">' + v.Detail_Quantity + '</div>';
                str += ' <div class="col-3 order-price" style="margin:auto">' + formatToMoney(v.Detail_Price) + ' VND </div>';
                str += '</div>';
            })
            $('#orderHeader-'+id+'').append(str);
           
        },
        
        catch: function(dataR){
            console.log(dataR);
        }

    });
    return result;
    
}