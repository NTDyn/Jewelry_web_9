<?php

function getListProduct($con, $per_page,$current){
$sql_getList="select * from product LIMIT $per_page  offset $current";
$result_list_pro=mysqli_query($con,$sql_getList);
$productList=[];
while($row=mysqli_fetch_assoc($result_list_pro)){
    array_push($productList,$row);
}
return $productList;

}
 function getrecord($con){
    $sql_getList="select * from product";
    $result=mysqli_query($con,$sql_getList);
    $sl=$result->num_rows;
    return $sl;
}


function getProduct($con,$id){
    $sql_product="select * from product where Product_ID=".$id;
    $result=mysqli_query($con,$sql_product);
    $product=mysqli_fetch_assoc($result);
    return $product;
}
function getListProductSearch($con, $hint,$per_page,$current){
    $sql_search="select product.Product_ID, product.Product_Name,category.Category_ID,product.Product_Price, product.Product_Quality,product.Product_Image, product.Product_Describe,product.Product_Status from product,category where product.Category_ID=category.Category_ID and ( Product_Name like  '%$hint%' or
    category.Category_Name like '%$hint%' or product.Product_Price like '%$hint%' or product.Product_Describe like '%$hint%' or product.Product_Quality like '%$hint%') LIMIT $per_page  offset $current ";
    $result=mysqli_query($con,$sql_search);
    $dataSearch=[];
    while($row=mysqli_fetch_assoc($result)){
        array_push($dataSearch,$row);

    }

    return $dataSearch;
}
function getrecordsearch($con,$hint){
    $sql_search="select product.Product_ID, product.Product_Name,category.Category_ID,product.Product_Price, product.Product_Quality,product.Product_Image, product.Product_Describe,product.Product_Status from product,category where product.Category_ID=category.Category_ID and ( Product_Name like  '%$hint%' or
    category.Category_Name like '%$hint%' or product.Product_Price like '%$hint%' or product.Product_Describe like '%$hint%' or product.Product_Quality like '%$hint%') ";
    $result=mysqli_query($con,$sql_search);
    $sl=$result->num_rows;
    return $sl;
}

?>
<?php
if(isset($_POST['hint'])){
$search=$_POST['hint'];
include '../user/connect.php';
if(strlen($search)==0){
    if(isset($_GET['per_page'])){
        // $current_page= $_GET['page'];
        // $item_page=$_GET['per_page'];
        // $ofset=($current_page-1)*$item_page;
        // $total_record=(int)getrecord($conn);
        // $total_page=ceil($total_record/$item_page);
        $data_product=getListProduct($conn,$item_page,$ofset);
    }else if (!isset($_GET['per_page'])){
    // $current_page=1;
    // $item_page=8;
    // $ofset=($current_page-1)*$item_page;
    // $total_record=(int)getrecord($conn);
    // $total_page=ceil($total_record/$item_page);
    $data_product=getListProduct($conn,$item_page,$ofset);
}

}
else{
    if(isset($_GET['per_page'])){
        // $current_page= $_GET['page'];
        // $item_page=$_GET['per_page'];
        // $ofset=($current_page-1)*$item_page;
        // $total_record=(int)getrecord($conn);
        // $total_page=ceil($total_record/$item_page);
        $data_product=getListProductSearch($conn,$search,$item_page,$ofset);
    }else if (!isset($_GET['per_page'])){
    $current_page=1;
    $item_page=8;
    $ofset=($current_page-1)*$item_page;
    $total_record=(int)getrecord($conn);
    $total_page=ceil($total_record/$item_page);
    $data_product=getListProductSearch($conn,$search,$item_page,$ofset);
}
}


?>
  <?php 
    $stt=($current_page-1)*8;
    
   
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
    <?php if( $data_product[$i]['Product_Status']==1) echo"Hoạt Động" ;else echo "Đã Xóa"?>
    </td>
    <td>
     
     <a id="btn_edit"  href="product_edit.php?edit_id=<?php echo $data_product[$i]["Product_ID"]?>" class="fa fa-edit edit"></a> 
    
        <a id="btn_delete" onclick=" return delete_product(<?php echo $data_product[$i]['Product_ID'] ?>  ,<?php echo $data_product[$i]['Product_Status'] ?>)==true"  href="product_delete.php?id=<?php echo $data_product[$i]["Product_ID"]?>" class=" <?php if($data_product[$i]['Product_Status']==1) {echo "fa fa-close delete";}else{ echo "fa fa-check delete";} ?>"></a>
    </td>
   </tr>
 <?php } }
 
 ?>
