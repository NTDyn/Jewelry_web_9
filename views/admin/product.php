<?php include('header.php');
include('../user/connect.php');
$sql_loaisp="select * from category";
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
    
    
    move_uploaded_file($img_sp_name,'../../assests/image_product/'.$img_sp);
    $sql_add= "insert into product( Product_Name, Category_ID, Product_Price, Product_Status, Product_Quality, Product_Describe, Product_Image) VALUES ('$ten_sp',$loai_sp,$gia_sp,1,$soluong_sp,'$mota_sp',' $target')";
    $query_add=mysqli_query($conn,$sql_add);
    }

}
$_SESSION['act'] = rand();
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
                    <input type="text" name="ten_sp" class="form-control" id="ten_sp" value="" placeholder="tên sản phẩm" required>
                </div>
                </div>
                <div class=" col-md6 mb-3"></div>
            
                <div class="row">
                    <div class="col-sm-6">
                    <input type="text" name="gia_sp" class="form-control" id="gia" value="" placeholder="giá"  required>
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
                <button name="them_sp" id="submit" class="btn btn-success">Add Sản Phẩm</button>
                <button id="btn-update" class="btn btn-primary">Update</button>
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
<button type="button" id="btn_them" class="btn btn-outline-success">Thêm</button>
</div>
<script>
    document.getElementById("btn_them").addEventListener("click",()=>{
        document.getElementsByClassName("container")[0].style.display="block";
        document.getElementById("btn-update").style.display="none";

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
    <th>Sửa</th>
    <th>Xóa</th>
   </tr>

   

  </thead>
  <tbody>
    <?php $sql_sanpham="select * from product" ;
    $stt=0;
    $result_sanpham=mysqli_query($conn,$sql_sanpham);
   
    while($row=mysqli_fetch_assoc($result_sanpham)){
    ?>
   <tr>
    <td>
     <?php echo $stt+=1;?>
    </td>
    <td>
        <?php echo $row['Product_Name']?>
    </td>
    <td>
        <?php $sql_lsp="select * from category where Category_ID=".$row["Category_ID"];
        $result=mysqli_query($conn,$sql_lsp);
        $row_lsp=mysqli_fetch_assoc($result);
        echo 
        $row_lsp["Category_Name"];
         ?>
    </td>
    <td>
        <?php echo $row['Product_Price']?>
    </td>
    <td>
    <?php echo $row['Product_Quality']?>
    </td>
    <td>
        <img  src=<?php echo "'".$row['Product_Image']."'"?> alt="">
    </td>
    <td>
    <?php echo $row['Product_Describe']?>
    </td>
    <td>
    <?php if( $row['Product_Status']==1) echo"Hoạt Động" ;else echo "Đã Xóa"?>
    </td>
    <td>
      <button Name='edit' class="fa fa-edit"></button>
    </td>
    <td>
        <button Name='delete' class="fa fa-close"></button>
    </td>
   </tr>
 <?php } ?>
  </tbody>
</table>
</div>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

