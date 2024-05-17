<?php 
function getlistspfull($con,$perpage,$current){
    $sql="select * from product where Product_Status=1 LIMIT $perpage offset $current";
    $result=mysqli_query($con,$sql);
    $productList=[];
    while($row=mysqli_fetch_assoc($result)){
        array_push($productList,$row);
    }
    return $productList;
}
function gettotalful($con){
    $sql="select * from product where Product_Status=1";
    $result=mysqli_query($con,$sql);
    $sl=$result->num_rows;
    return $sl;
}
function getlistsearch($con,$perpage,$current,$hint){
    $sql="select * from product where Product_Status=1 and (Product_Name LIKE '%$hint%' or Product_Price LIKE '%$hint%') LIMIT $perpage offset $current";
    $result=mysqli_query($con,$sql);
    $productList=[];
    while($row=mysqli_fetch_assoc($result)){
        array_push($productList,$row);
    }
    return $productList;

}
function gettotalsearch($con,$hint){
    $sql="select * from product where Product_Status=1 and (Product_Name LIKE '%$hint%' or Product_Price LIKE '%$hint%') ";
    $result=mysqli_query($con,$sql);
    $sl=$result->num_rows;
    return $sl;
}
?>