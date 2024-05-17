<link  type="text/css"  href="../../assests/user/css/product.css?v=3"  rel="stylesheet"> 
<?php 
include 'header.php';
include 'connect.php';
include 'product_controller.php';
$per_page=8;
if(!isset($_GET['page'])&&!isset($_GET['searchValue'])){
 
  $current_page=1;
 
  $getrecords=gettotalful($conn);
  $total_page=ceil($getrecords/8);
  $ofset=(int)($current_page-1)*$per_page;
$data_product=getlistspfull($conn,$per_page,$ofset);
}
if(isset($_GET['page'])&&!isset($_GET['searchValue'])){
$current_page=$_GET['page'];
$getrecords=gettotalful($conn);
$total_page=ceil($getrecords/8);
$ofset=(int)($current_page-1)*$per_page;
$data_product=getlistspfull($conn,$per_page,$ofset);
}
$hint="";
if(isset($_GET['searchValue'])){
$hint=$_GET['searchValue'];
}else{
  $hint="";
}
if(isset($_GET['searchValue'])){

  if(strlen($hint)==0){
    if(!isset($_GET['searchValue'])){
      $current_page=1;
      $getrecords=gettotalful($conn);
      $total_page=ceil($getrecords/8);
      $ofset=(int)($current_page-1)*$per_page;
    $data_product=getlistspfull($conn,$per_page,$ofset);
    }else{
      $current_page=$_GET['page'];
      $getrecords=gettotalful($conn);
      $total_page=ceil($getrecords/8);
      $ofset=(int)($current_page-1)*$per_page;
      $data_product=getlistspfull($conn,$per_page,$ofset);
    }
   
  }else if(strlen($hint)!=0){
    if(isset($_GET['page'])){
      
      // echo "<script>alert('$hint')</script>";
      $current_page=$_GET['page'];
      $getrecords=gettotalsearch($conn,$hint);
   
      $total_page=ceil($getrecords/8);
      $ofset=(int)($current_page-1)*$per_page;
      $data_product=getlistsearch($conn,$per_page,$ofset,$hint);
    }else {
      $current_page=1;
     
    $getrecords=gettotalsearch($conn,$hint);
    $total_page=ceil($getrecords/8);
    $ofset=(int)($current_page-1)*$per_page;
    $data_product=getlistsearch($conn,$per_page,$ofset,$hint);
    }
  }
}


?>
 <div  id="message_add_cart" class="alert alert-success" style="display: none; ">
                                Thêm vào giỏ hàng thành công
                            </div>
 <div id="warning_add_cart"  class="alert alert-warning" style="display: none;">
                                Thêm vào giỏ hàng không thành công
  </div>
                            
<div class="row product-area">
<?php for($i=0;$i<count($data_product);$i++){
  $tt="";
  if($data_product[$i]["Product_Quality"]==0){
    $tt="Hết hàng";
  }else $tt="";
  ?>
      <div class = "col-3 product-item">
          <input type="hidden" class="product-id" value="<?php echo $data_product[$i]['Product_ID']?>">
           <div class="product-grid"> 
            <div class="product-image"> 
            <a href="#"> 
             <img class="product-picture" src="<?php echo $data_product[$i]["Product_Image"] ?>"> 
            </a> 
           <a style="text-decoration:none " href="#" class="product-like-icon" >
          <span><?php echo $tt?></span>
            </a>
            <ul class="product-links"> 
            <li class="btn-detail"><a href="#"  ><i class="fa fa-eye "></i></a></li> 
        
            <li class="btn_add"><a onclick=" return  add_cart('<?php echo $data_product[$i]['Product_ID']?>')==true"><i class="fa fa-shopping-cart" ></i></a></li>' 
             <li><a href="#" ><i class="fa fa-random"></i></a></li>
            </ul> 
            </div> 
            <div class="product-content"> 
             <h3 class="title"><a href="#" class="product-name"> <?php echo $data_product[$i]["Product_Name"] ?> </a></h3> 
             <div class="price"> <?php echo $data_product[$i]["Product_Price"] ?></div> 
            </div> 
            </div> 
            </div>
<?php } ?>



<!-- The Detail Modal -->
<div class="modal" id="modalDetail">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content" id="content" >
    
    </div>
  </div>
</div>


<?php include("pagination.php") ?>
<script><?php include '../../assests/user/js/product.js'?></script>