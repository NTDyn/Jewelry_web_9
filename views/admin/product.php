<?php include('header.php');
include('../user/connect.php');
include('../admin/product_controller.php');
$data_product=getListProduct($conn);

$sql_loaisp="select * from category where Category_Status=1";
$result =mysqli_query($conn,$sql_loaisp);
if(isset($_POST["them_sp"])){
    if(isset($_POST['ten_sp'])){
        $ten_sp=$_POST['ten_sp'];
    }
    $target_dir='../../assests/image_product/';
    $target = $target_dir.basename($_FILES["image"]["name"]);
  
    $gia_sp=$_POST['gia_sp'];
    $soluong_sp=$_POST['soluong'];
    $mota_sp=$_POST['mota'];
    $loai_sp=$_POST['loaisp'];
    if(isset($_FILES["image"])){
    $img_sp=$_FILES["image"]["name"];
    $img_sp_name=$_FILES["image"]["tmp_name"];
    $uploaded_type=$_FILES["image"]["type"];
    $uploaded_size=$_FILES["image"]["size"];
    // echo $uploaded_type;
    // if($uploaded_type!="jpg"&& $uploaded_type!="png"&& $uploaded_type!="jpeg"){
    //     echo "<script>swal.fire({
    //         title: 'Hình Ảnh',
    //         text: 'chỉ hỗ trợ upload JPEG, JPG, PNG',
    //         type: 'error',
            
    //       }).then(function(){
    //         window.location.href='product.php';
    //       });
        
         
    //       </script>";
          
    // }
    
    // else{
    move_uploaded_file($img_sp_name,'../../assests/image_product/'.$img_sp);
    $sql_add= "insert into product( Product_Name, Category_ID, Product_Price, Product_Status, Product_Quality, Product_Describe, Product_Image) VALUES ('$ten_sp',$loai_sp,$gia_sp,1,$soluong_sp,'$mota_sp',' $target')";
    
    if($query_add=mysqli_query($conn,$sql_add)){
        echo '<script> Swal.fire({
            title: "Thành công!",
            text: "Thêm sản phẩm thành công!",
            icon: "success",
            timer: 2000,
          });</script>';
       }else{
        echo '<script> Swal.fire({
            title: "Thất bại!",
            text: "Thêm sản phẩm thất bại!",
            icon: "error",
            timer: 2000,
          });</script>';
    }
    }
    // }

}

 ?>
 

 <div class="backgroud">

<div class="container">
    <form enctype="multipart/form-data" method="post" >
        <div class="close">
            <i id="close_button"  class="fa fa-close"></i>
        </div>
        <h2 class="mt-5 mb-5" id="td">
            Sản Phẩm
        </h2>


        <div class="mb-5">
            <div class="row">
                <div class="col-sm-12">
                    <input type="text" name="ten_sp" class="form-control" id="ten_sp" value="" placeholder="Tên sản phẩm" required>
                </div>
                </div>
                <div class=" col-md6 mb-3"></div>
            
                <div class="row">
                    <div class="col-sm-6">
                    <input type="text" name="gia_sp" class="form-control" id="gia" value="" placeholder="Đơn giá"  required>
                    </div>
                    <div class="col-sm-6">
                    <input type="number" name="soluong" class="form-control" id="sl" placeholder="1"  required>
                    </div>
                </div>
              
                <div class=" col-md6 mb-3">
                   
            </div>
            
              <div class="row">
        <div class="col-sm-12" >
        <input enctype="multipart/form-data" type="file" name="image" class="form-control" id="image" placeholder="Hình Ảnh"  required>
        </div>
      </div>
      <div class=" col-md6 mb-3">   </div>
                   
      <div class="row">
        <div class="col-sm-12" >
        <select name="loaisp" class="form-select" id="loaiSP"  required>
      <?php
       
         while($row=mysqli_fetch_assoc($result)){?>
         <option value="<?php echo $row['Category_ID']?>"><?php echo $row['Category_Name']?></option>
         <?php  }?> 
   </select>
        </div>
      </div>
      <div class=" col-md6 mb-3"> </div>
                   
      <div class="row">
      <div class="form-floating mb-3">
       <textarea class="form-control"name="mota" id="motasp" value="" style="height: 80px" ></textarea>
        </div>
      </div>
      <input type="hidden" name="act" value="<?php echo $_SESSION['act']; ?>">
            <div class="col-lg-12 mt-5">
                <button name="them_sp" id="submit" class="btn btn-success">Thêm Sản Phẩm</button>
               
            </div>
    </form>
</div>
</div>
<script>
    document.getElementById("close_button").addEventListener("click", ()=>{
        document.getElementsByClassName("container")[0].style.display="none";
    });
   
</script>
<div class="add_sp">
<!-- <button type="button" id="btn_them" class="btn btn-outline-success">Thêm</button>
 -->
 <input  type="text" name="hint" id="search" placeholder="Tìm Kiếm"  >
</div>
<script>
    document.getElementsByClassName("btn-add")[0].addEventListener("click",()=>{
        document.getElementsByClassName("container")[0].style.display="block";
        document.getElementById("btn-update").style.display="none";
        

    })
 
      $(document).ready(function(){
        $("#search").keyup(function(){
            var hint=$("#search").val();
           $.post("product_controller.php",{hint:hint}, function(data){
            
          $('.danhsach').html(data);
           })
        })
      })
   
   
   
    
    
</script>
<div class="table_sp">
<table class="table">
  <thead class="table-danger">
   <tr>
    <th>STT</th>
    <th>Tên Sản Phẩm</th>
    <th>Loại Sản Phẩm</th>
    <th>Giá</th>
    <th>Số Lượng</th>
    <th>Hình Ảnh</th>
    <th>Mô Tả</th>
    <th>Trạng Thái</th>
    <th>Hành Động</th>
   
   </tr>

   

  </thead>
  <tbody class="danhsach">
    <?php 
    $stt=0;
    
   
    for($i=0;$i<count($data_product);$i++){
    ?>
   <tr>
    <td>
     <?php echo $stt+=1;?>
    </td>
    <td>
        <?php echo $data_product[$i]["Product_Name"]?>
    </td>
    <td>
        <?php $sql_lsp="select * from category where Category_ID=".$data_product[$i]["Category_ID"];
        $result=mysqli_query($conn,$sql_lsp);
        $row_lsp=mysqli_fetch_assoc($result);
        echo 
        $row_lsp["Category_Name"];
         ?>
    </td>
    <td>
        <?php echo $data_product[$i]['Product_Price']?>
    </td>
    <td>
    <?php echo $data_product[$i]['Product_Quality']?>
    </td>
    <td>
        <img  src=<?php echo "'".$data_product[$i]['Product_Image']."'"?> alt="">
    </td>
    <td>
    <?php echo $data_product[$i]['Product_Describe']?>
    </td>
    <td>
    <?php if( $data_product[$i]['Product_Status']==1) echo"Hoạt Động" ;else echo "Ngừng hoạt động"?>
    </td>
    <td>
     
     <a id="btn_edit"  href="product_edit.php?edit_id=<?php echo $data_product[$i]["Product_ID"]?>" class="fa fa-edit edit"></a> 
    
        <a id="btn_delete" onclick=" return delete_product(<?php echo $data_product[$i]['Product_ID'] ?>  ,<?php echo $data_product[$i]['Product_Status'] ?>)==true"  href="product_delete.php?id=<?php echo $data_product[$i]["Product_ID"]?>" class=" <?php if($data_product[$i]['Product_Status']==1) {echo "fa fa-close delete";}else{ echo "fa fa-check delete";} ?>"></a>
    </td>
   </tr>
 <?php } ?>
  </tbody>
</table>
</div>
<script>
   



</script>

