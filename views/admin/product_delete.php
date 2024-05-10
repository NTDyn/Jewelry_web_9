<?php
include '../user/connect.php';

if(isset($_GET['id'])){
$id=$_GET['id'];
if(deleteProduct($conn,$id)==true){
   echo "Xóa thành công";
}
}


if(isset($_POST['id_kp'])){
   $id_kp=$_POST['id_kp'];
   if(khoiphucsp($conn,$id_kp)==true){
      echo"Khôi phục thành công";
  
   }
}


function deleteProduct($con,$id){
   $sql_delete="update product set Product_Status=0 where Product_ID=".$id;
  if( $result_delete=mysqli_query($con,$sql_delete)){
   return true;
  }
}
function khoiphucsp($con,$id){
   $sql_khoiphuc="update product set Product_Status=1 where Product_ID=".$id;
   if( $result_delete=mysqli_query($con,$sql_khoiphuc)){
    return true;
   }
}

?>
