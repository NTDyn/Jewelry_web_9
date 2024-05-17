

<?php 
include '../admin/product.php';
include '../user/connect.php';

$id=$_GET['edit_id'];

$sql_product="select * from product where Product_ID=".$id;
    $result=mysqli_query($conn,$sql_product);
    $product=mysqli_fetch_assoc($result);
    $name=$product["Product_Name"];
    // echo "<script>alert('$name')</script>";
 $sql_list_cate="select * from category where Category_Status=1";
 $result_cate=mysqli_query($conn,$sql_list_cate);
 $cateList=[];
 while($row=mysqli_fetch_assoc($result_cate)){
    array_push($cateList,$row);
 }

 if(isset($_POST['update_sp'])){
    if(isset($_POST['ten_sp'])){
        $ten_sp=$_POST['ten_sp'];
    }
 
  
    $gia_sp=$_POST['gia_sp'];
    $soluong_sp=$_POST['soluong'];
    $mota_sp=$_POST['mota'];
    $loai_sp=$_POST['loaisp'];
    if(isset($_FILES["image"])){
    $target_dir='../../assests/image_product/';
    $target = $target_dir.basename($_FILES["image"]["name"]);
    if($soluong_sp<0||$soluong_sp>10000){
        echo "<script>swal.fire({
                    title: 'Cảnh báo',
                     text: 'Số lượng không hợp lệ',
                     type: 'error',}).then(function(){
                        window.location.href='product.php'});</script>";
                     return;
    }

  

    if($target==$target_dir){
        $sql_add_2= "update product set Product_Name= '".$ten_sp."' ,Product_Price=".$gia_sp." , Product_Quality=".$soluong_sp." , Product_Describe= '".$mota_sp."' where Product_ID=".$id;
       if( $query_add_2=mysqli_query($conn,$sql_add_2)){
        echo "<script>
        
        swal.fire({
            title: 'Sản phẩm',
            text: 'Sửa thông tin thành công',
            type: 'success',
            
          }).then(function(){
            window.location.href='product.php'});
          </script>";
          
       }else{
        echo "<script>swal.fire({
            title: 'Sản phẩm',
            text: 'Sửa thông tin thất bại',
            type: 'error',
            
          })
        
         
          </script>";
          
       }
    }else{
        $img_sp=$_FILES["image"]["name"];
        $img_sp_name=$_FILES["image"]["tmp_name"];
        $uploaded_type=$_FILES["image"]["type"];
        $uploaded_size=$_FILES["image"]["size"];
        if($uploaded_type!="image/jpg"&& $uploaded_type!="image/png"&& $uploaded_type!="image/jpeg"){
            echo "<script>swal.fire({
                title: 'Hình Ảnh',
                text: 'chỉ hỗ trợ upload JPEG, JPG, PNG',
                type: 'error',
                
              }).then(function(){
                window.location.href='product.php';
              });
            
             
              </script>";
              
        }
  
        move_uploaded_file($img_sp_name,'../../assests/image_product/'.$img_sp);
        $sql_edit= "update product set Product_Name='".$ten_sp."' ,Product_Price=".$gia_sp." , Product_Quality=".$soluong_sp." , Product_Describe='".$mota_sp."' ,Product_Image='".$target."' where Product_ID=".$id;
       if( $query_edit=mysqli_query($conn,$sql_edit)){
        echo "<script>swal.fire({
            title: 'Sản phẩm',
            text: 'Sửa thông tin thành công',
            type: 'success',
            
          }).then(function(){
            window.location.href='product.php';
          });
        
         
          </script>";
          
       }else{
        echo "<script>swal.fire({
            title: 'Sản phẩm',
            text: 'Sửa thông tin thất bại',
            type: 'error',
            
          })
        
         
          </script>";
          
       }
       }
    
  
    
}
    // header("Location: product.php");
 }
 



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  type="text/css" href= "../../assests/admin/css/bootstrap/bootstrap.min.css"  rel="stylesheet">
    <link  type="text/css" href="../../assests/admin/css/fonts/font-awesome.min.css" rel="stylesheet">
    <link  type="text/css" href="../../assests/admin/css/iconfonts/icons.css" rel="stylesheet">
    <link  type="text/css" href="../../assests/admin/css/iconfonts/plugin.css" rel="stylesheet"> -->
    <link  type="text/css"  href="../../assests/admin/css/product2.css"  rel="stylesheet"> 
    <script src="../../assests/admin/js/swal/swalNotification.js"></script>
    <script></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <title>Document</title>
</head>
<body>
    <?php if($product["Product_Status"]==0) {
 echo  '<script> 
    Swal.fire("Sản phẩm đã xóa", "Không thể cập nhật!", "error").then(function(){
        window.location.href="product.php";
      });

    
  </script>';
  
    }
    else{
   ?>
<div class="backgroud">

<div style="width: 1000px; height: 500px;border: solid #C0C0C0 1px;" class="container_c">
    <form enctype="multipart/form-data" method="post" >
        <div class="close">
            <i id="close_button_c"  class="fa fa-close"></i>
        </div>
        <h2 class="mt-5 mb-5" id="td">
            Sản Phẩm
        </h2>


        <div class="mb-5">
            <div class="row">
                <div class="col-sm-12">
                    <input type="text" name="ten_sp" class="form-control" id="ten_sp" value="<?php echo $product["Product_Name"]?>" placeholder="Tên sản phẩm" required>
                </div>
                </div>
                <div class=" col-md6 mb-3"></div>
            
                <div class="row">
                    <div class="col-sm-6">
                    <input type="text" name="gia_sp" class="form-control" id="gia" value="<?php echo $product["Product_Price"]?>" placeholder="Đơn giá"  required>
                    </div>
                    <div class="col-sm-6">
                    <input type="number" name="soluong" class="form-control" id="sl" value="<?php echo $product["Product_Quality"]?>" placeholder="1"  required>
                    </div>
                </div>
              
                <div class=" col-md6 mb-3">
                   
            </div>
            
              <div style="margin: 5px;" class="row">
              <div class="row g-0 text-center">
              <div class="col-sm-6 col-md-8"><input onchange="readURL(this);" enctype="multipart/form-data" type="file" name="image" class="form-control" id="image" placeholder="Hình Ảnh"  ></div>
             <div class="col-6 col-md-4"><img id="previewImage" style="width:50px ; height:50px;" src="<?php echo $product['Product_Image']?>" alt=""></div>
              </div>
      </div>
      <div class=" col-md6 mb-3">   </div>
                   
      <div class="row">
        <div class="col-sm-12" >
        <select name="loaisp" class="form-select" id="loaiSP"  required>
       <?php for ($i=0;$i<count($cateList);$i++){
        if($cateList[$i]["Category_ID"]==$product["Category_ID"]){
           
        ?>
         <option selected value="<?php echo $cateList[$i]["Category_ID"]?>"> <?php echo $cateList[$i]["Category_Name"]?></option>
         <?php } else { ?>
         <option  value="<?php echo $cateList[$i]["Category_Name"]?>"><?php echo $cateList[$i]["Category_Name"]?></option>
        <?php } }?>
   </select>
        </div>
      </div>
      <div class=" col-md6 mb-3"> </div>
                   
      <div class="row">
      <div class="form-floating mb-3">
       <textarea class="form-control"name="mota" id="motasp" value="<?php echo $product["Product_Describe"]?>" style="height: 80px" ><?php echo $product["Product_Describe"]?></textarea>
        </div>
      </div>
     
            <div class="col-lg-12 mt-5">
            
                <button name="update_sp" id="btn-update" class="btn btn-primary">Update</button>
            </div>
    </form>
</div>
</div>
</body>
<script>

document.getElementsByClassName("container_c")[0].style.display="block";
      document.getElementById("close_button_c").addEventListener("click", ()=>{
        document.getElementsByClassName("container_c")[0].style.display="none";
        window.location.href = 'product.php';
    });
</script>
</html>
<?php }


?>


