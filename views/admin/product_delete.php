<?php
include '../user/connect.php';
include '../admin/product_controller.php';
$id=$_GET['id'];
if(deleteProduct($conn,$id)==true){
   header("Location: product.php");
}
?>
