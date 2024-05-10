
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
function delete_product(id, status){
    if(status==1){
    swal.fire({
        title: 'Xóa Sản Phẩm',
        text:"Bạn có muốn xóa sản phẩm không?",
        showCancelButton: true,
        confirmButtonText: 'ok',
        cancelButtonText: 'cancel',
        allowOutsideClick: false
    }).then((result) => {
        if (result.dismiss !== 'cancel') {

            $.get("product_delete.php", {id:id}, function(data){
        
     Swal.fire({
    title: "Thành công!",
    text:data,
    icon: "success",
    timer: 2000,
  }).then(function(){
    window.location="product.php";
  })
         })
 
            return true;
        }
       else
        {
           
            return false;


        }
    })
}
else{
    swal.fire({
        title: 'Khôi phục sản phẩm',
        text:"Bạn có muốn khôi phục sản phẩm không?",
        showCancelButton: true,
        confirmButtonText: 'ok',
        cancelButtonText: 'cancel',
        allowOutsideClick: false
    }).then((result) => {
        if (result.dismiss !== 'cancel') {
          
            $.post("product_delete.php", {id_kp:id}, function(data1){
        
     Swal.fire({
    title: "Thành công!",
    text:data1,
    icon: "success",
    timer: 2000,
    
  }).then(function(){
    window.location="product.php";
  })
         })
           
            return true;
        }
       else
        {
            return false;

        }
     
    })
}
}

function edit_product(){
    
}

$(document).ready(function(){
    $('#breadcrumb-second').text('Sản phẩm');
})

