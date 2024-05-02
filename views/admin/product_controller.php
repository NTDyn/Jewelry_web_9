<?php

function getListProduct($con){
$sql_getList="select * from product where Product_Status=1";
$result_list_pro=mysqli_query($con,$sql_getList);
$productList=[];
while($row=mysqli_fetch_assoc($result_list_pro)){
    array_push($productList,$row);
}
return $productList;

}

function deleteProduct($con,$id){
    $sql_delete="update product set Product_Status=0 where Product_ID=".$id;
   if( $result_delete=mysqli_query($con,$sql_delete)){
    return true;
   }
}

function getProduct($con,$id){
    $sql_product="select * from product where Product_ID=".$id;
    $result=mysqli_query($con,$sql_product);
    $product=mysqli_fetch_assoc($result);
    return $product;
}

?>