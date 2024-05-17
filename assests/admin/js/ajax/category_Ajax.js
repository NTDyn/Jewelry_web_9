let listCategory = [];
// Add Category

$(document).on('click','#btn-modal-add',function(e) {
    var data = $("#add_form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "../../route/route_category.php",
        success: function(dataResult){
            $("#modal-add").modal('hide');
            Swal.fire({
                title: "Thành công!",
                text: "Loại sản phẩm đã được thêm!",
                icon: "success",
                timer: 3000,
              });
              $('#list-category').empty();
              getCate();
        }

    });
});

$("#add-form").submit(function(e) {
    e.preventDefault();
});

let table ;

$(document).ready(async function(e){
    
    getCate();
})
 function getCate() {
    var _data = {"action": "read" }; 
    $.ajax({
        data: _data ,
        type: "post",
        url: "../../route/route_category.php",
       
       success:  function(dataResult){
            dataResult = JSON.parse(dataResult);
            listCategory = dataResult;
           appendListCategory(dataResult);
           table = $('#myTable').DataTable();
        },
        
        catch: function(dataR){
            console.log(dataR);
        }

    });
}
function appendListCategory(dataList){
    
    $.each(dataList, function(k,v){
        let str = "";
            str += '<tr class="category-item">';
            str += '<td>'+ parseInt(k+ 1)  + '</td>';
            str += '<td class="category-id">'+ v.Category_ID + '</td>';
            str += '<td class="category-name">' + v.Category_Name + '</td>';
            str += '<td>' + v.Category_Number + '</td>';
            if(v.Category_Status == 1){
                str += '<td style = "color: #00c851 ; font-weight:bold"> Hoạt động </td>';
            } else {
                str += '<td style="color: red ; font-weight:bold"> Ngừng hoạt động</td>';
            }
            str += '<td>';
            str += ' <button  class="btn-edit" data-bs-toggle="modal" data-bs-target="#modalEdit" >';
            str += '<span class="fa fa-pencil-square-o " ></span>';
            str += '</button>';
            if(v.Category_Status == 1){
                str += ' <button class="btn-remove" type="button" data-bs-toggle="modal" data-bs-target="#modalRemove" >';
                str += '<span class=" fa fa-toggle-on"></span>';
                str += '</button>';
            } else {
                str += '<button class="btn-restart" type="button" data-bs-toggle="modal" data-bs-target="#modalRestart" >';
                str += '<span class=" fa fa-toggle-off"></span>';
                str += '</button>';
            }
            str += '</td>'
            str += '</tr>'
     
        $('#list-category').append(str);
        
})

}

// Remove Category
$(document).on('click','.btn-remove',function(){
    let id = $(this).closest('.category-item').find('.category-id').text();
    $('#id_remove').val(id);
})

$(document).on('click','.btn-modal-remove', function(e){
    var data = $("#remove-form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "../../route/route_category.php",
        success: function(dataResult){
            if(dataResult == "true"){
                $("#modalRemove").modal('hide');
                Swal.fire({
                    title: "Thành công!",
                    text: "Loại sản phẩm đã được ngừng hoạt động!",
                    icon: "success",
                    timer: 2000,
                  });
                  $('#list-category').empty();
                  getCate();
            }
           
        }

    });
})

$("#remove-form").submit(function(e) {
    e.preventDefault();
});

// Restart Category

$(document).on('click','.btn-restart',function(){
    let id = $(this).closest('.category-item').find('.category-id').text();
    $('#id_restart').val(id);
})

$(document).on('click','.btn-modal-restart', function(e){
    var data = $("#restart-form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "../../route/route_category.php",
        success: function(dataResult){
            if(dataResult == "true"){
                $("#modalRestart").modal('hide');
                Swal.fire({
                    title: "Thành công!",
                    text: "Loại sản phẩm đã được hoạt động!",
                    icon: "success",
                    timer: 2000,
                  });
                  $('#list-category').empty();
                  getCate();
            }
           
        }

    });
})

$("#restart-form").submit(function(e) {
    e.preventDefault();
});

// Edit Category 
$(document).on('click','.btn-edit',function(){
    let name = $(this).closest('.category-item').find('.category-name').text();
    $('#txt_edit_category').val(name);
    let id = $(this).closest('.category-item').find('.category-id').text();
    $('#id_edit_category').val(id);
})
$(document).on('click','#btn-modal-edit', function(e){
    let name = $('#txt_edit_category').val();
    if(listCategory.find(x=>x.Category_Name == name)){
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Tên thể loại sản phẩm đã tồn tại!",
          });
    } else {
        editCategory();
    }

})

function editCategory(){
    var data = $("#edit-form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "../../route/route_category.php",
        success: function(dataResult){
            if(dataResult == "true"){
                $("#modalEdit").modal('hide');
                Swal.fire({
                    title: "Thành công!",
                    text: "Loại sản phẩm đã được chỉnh sửa!",
                    icon: "success",
                    timer: 2000,
                  });
                  $('#list-category').empty();
                  getCate();
            }
           
        }

    });
}

$("#edit-form").submit(function(e) {
    e.preventDefault();
});