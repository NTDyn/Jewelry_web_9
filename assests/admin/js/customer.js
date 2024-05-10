$(document).ready( function(){
    $('#breadcrumb-second').text('Khách hàng');
    readCustomer();
})

$('#modal-add').on('hidden.bs.modal', function (e) {
    $('.error-notify').text('');
    $(this)
      .find("input,textarea,select")
         .val('')
         .end()
      .find("input[type=checkbox], input[type=radio]")
         .prop("checked", "")
         .end();
  })
function readCustomer(){
    var _data = {"action": "read"}; 
    $.ajax({
        data: _data ,
        type: "post",
        url: "../../route/route_customer.php",
       
       success:  function(dataResult){
            dataResult = JSON.parse(dataResult);
           appendListCustomer(dataResult);
           $('#customer-table').dataTable();
        },
        
        catch: function(dataR){
            console.log(dataR);
        }

    });
}

function appendListCustomer(data){
    $.each(data, function(k,v){
        str = "";
        str += "<tr class='customer-item'>";
        str += "<td class='customer-id'>" + v.Customer_ID + "</td>";
        str += "<td>" + v.Customer_Name + "</td>";
        str += "<td>" + v.Customer_Username + "</td>";
        str += "<td>" + v.Customer_Phone + "</td>";
        str += "<td>" + v.Customer_Email + "</td>";
        str += "<td>" + v.Customer_Address + "</td>";
        if( v.Customer_Status == 1){
            str += "<td class = 'btn-active'>" ;
            str += "<span> Hoạt động </span> ";
            str += "</td>";
        } else {
            str += "<td class='btn-inactive'>" ;
            str += "<span  > Ngừng hoạt động </span> ";
            str += "</td>";
        }
        str += "<td>"
            if(v.Customer_Status == 1){
                str += ' <button  class="btn-edit" data-bs-toggle="modal" data-bs-target="#modalEdit" >';
                str += '<span class="fa fa-pencil-square-o " ></span>';
                str += '</button>';
                str += ' <button class="btn-remove" type="button" data-bs-toggle="modal" data-bs-target="#modalRemove" >';
                str += '<span class=" fa fa-toggle-on"></span>';
                str += '</button>';
            } else {
                str += ' <button class="btn-uneditable" disabled >';
                str += '<span class="fa fa-pencil-square-o " ></span>';
                str += '</button>';
                str += '<button class="btn-restart" type="button" data-bs-toggle="modal" data-bs-target="#modalRestart" >';
                str += '<span class=" fa fa-toggle-off"></span>';
                str += '</button>';
            }
        str += "</td>"
        str += "</tr>";

        $('#list-customer').append(str);
    })

}

$("#read-customer-form").submit(function(e) {
    e.preventDefault();
});

// Remove Customer
$(document).on('click','.btn-remove', function(){
    let id = $(this).closest('.customer-item').find('.customer-id').text();
    $('#id_remove').val(id);
})

$('.btn-modal-remove').click(function(){
    removeCustomer();
})

function removeCustomer(){
    var data = $("#remove-form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "../../route/route_customer.php",
        success: function(dataResult){
            if(dataResult == 1){
                $("#modalRemove").modal('hide');
                Swal.fire({
                    title: "Thành công!",
                    text: "Tài khoản đã được ngừng hoạt động!",
                    icon: "success",
                    timer: 2000,
                  });
                  $('#list-customer').empty();
                  readCustomer();
            }
           
        }

    });
}

$("#remove-form").submit(function(e) {
    e.preventDefault();
});

// Restart Customer

$(document).on('click', '.btn-restart', function(){
    let id = $(this).closest('.customer-item').find('.customer-id').text();
    $('#id_restart').val(id);
})

$('.btn-modal-restart').click(function(){
    restartCustomer();
})

function restartCustomer(){
    var data = $("#restart-form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "../../route/route_customer.php",
        success: function(dataResult){
            if(dataResult == 1){
                $("#modalRestart").modal('hide');
                Swal.fire({
                    title: "Thành công!",
                    text: "Tài khoản đã hoạt động!",
                    icon: "success",
                    timer: 2000,
                  });
                  $('#list-customer').empty();
                  readCustomer();
            }
           
        }

    });
}

$("#restart-form").submit(function(e) {
    e.preventDefault();
});

$('#btn-modal-add').click(function(){
    addCustomer();
})

function addCustomer(){
    var data = $("#add_form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "../../route/route_customer.php",
        success: function(dataResult){
            dataResult = JSON.parse(dataResult);
            $('.error-notify').text('');
            $.each(dataResult, function(k,v){
                if(v.Status == 0){
                    errorInnerHTML(v);
                }

                if(v.Status == 200){
                    $("#modal-add").modal('hide');
                    Swal.fire({
                        title: "Thành công!",
                        text: "Thêm khách hàng thành công!",
                        icon: "success",
                        timer: 2000,
                      });
                      $('#list-customer').empty();
                      readCustomer();
                      $('.error-notify').text('');
                }
            })
        }

    });
}

$("#add_form").submit(function(e) {
    e.preventDefault();
 
 });

// EDIT Customer
$(document).on('click', '.btn-edit', function(){
    let id =  $(this).closest('.customer-item').find('.customer-id').text();
    $('#id_edit').val(id);
    getCustomer(id);
})
function getCustomer(id){
    var data = {"action":"getCustomer", "id_edit": id};
    $.ajax({
        data: data,
        type: "post",
        url: "../../route/route_customer.php",
        success: function(dataResult){
            dataResult = JSON.parse(dataResult);
            $('.error-notify').text('');
            $('#customer-edit-name').val(dataResult.Customer_Name);
            $('#customer-edit-address').val(dataResult.Customer_Address);
            $('#customer-edit-phone').val(dataResult.Customer_Phone);
            $('#customer-edit-email').val(dataResult.Customer_Email);
            $('#customer-edit-username').val(dataResult.Customer_Username);
           
        }

    });
}

$('#btn-modal-edit').click(function(){
    editCustomer();
})

function editCustomer(){
    var data = $("#edit_form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "../../route/route_customer.php",
        success: function(dataResult){  
            dataResult = JSON.parse(dataResult);
            $('.error-notify').text('');
            $.each(dataResult, function(k,v){
                
                if(v.Status == 0){
                    errorInnerHTML(v);
                }
                if(v.Status == 200){
                    $("#modalEdit").modal('hide');
                    Swal.fire({
                        title: "Thành công!",
                        text: "Chỉnh sửa thông tin khách hàng thành công!",
                        icon: "success",
                        timer: 2000,
                      });
                      $('#list-customer').empty();
                      readCustomer();
                }
            })
        }

    });
}

$("#edit_form").submit(function(e) {
   e.preventDefault();

});

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

}