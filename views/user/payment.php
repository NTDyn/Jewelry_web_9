
<?php

 include 'header.php';
include 'connect.php';
$arr_id_select=[];
$username=$_SESSION['user'];
$sql="select * from customer where Customer_UserName='$username'";
$result=mysqli_query($conn,$sql);
$getUser_Login=mysqli_fetch_assoc($result);
if(isset($_POST['btn_muahang'])){
   if(isset($_POST['id_select'])){
  
    foreach($_POST['id_select'] as $id){
    //  update_status_cart($id);
    array_push($arr_id_select,$id);
    
    }
   }else{
    echo "<script>swal.fire({
        title: 'Cảnh báo',
         text: 'Vui lòng chọn sản phẩm để đặt hàng',
         type: 'error',}).then(function(){
            window.location.href='product.php'});</script>";
   }
   $_SESSION['listsanphamdangdat']=$arr_id_select;

  

}

 function getslbyid($idsp){
    $listcart=$_SESSION['giohanglist'];
    $user=$_SESSION['user'];
    for($i=0;$i<count($listcart);$i++){
        if($listcart[$i]['username']==$user){
            for($j=0;$j<count($listcart[$i]['product']);$j++){
                if($idsp==$listcart[$i]['product'][$j]['id']){
                    return $listcart[$i]['product'][$j]['sl'];
                }
            }
        }
    }
 }
 function tinhtongsl(){
    $listdangdat=$_SESSION['listsanphamdangdat'];
    $listcart=$_SESSION['giohanglist'];
    $tong=0;
    for($i=0;$i<count($listdangdat);$i++){
        $tong+=getslbyid($listdangdat[$i]);
    }
    return $tong;
 }
 function update_status_cart($arr){
    $listcart=$_SESSION['giohanglist'];
    $user =$_SESSION['user'];
    for($i=0;$i<count($listcart);$i++){
        if($listcart[$i]['username']==$user){
            for($j=0;$j<count($listcart[$i]['product']);$j++){
                for($z=0;$z<count($arr);$z++){
                    if($listcart[$i]['product'][$j]['id']==$arr[$z]&&$listcart[$i]['product'][$j]['status']==0){
                        $listcart[$i]['product'][$j]['status']=1;
    
                    }
                }
               
            }
        }
    }
    $_SESSION['giohanglist']=$listcart;
 }
 function tinhtong($con,$arr){
     $tong=0;
    foreach($arr as $id) {
        $sql="select * from product where Product_ID=$id";
        $sl=0;
        $sl=getslbyid($id);
        $result=mysqli_query($con,$sql);
        $getProduct=mysqli_fetch_assoc($result);
         $tong+=$sl*$getProduct["Product_Price"];

    }
    return $tong;
 }
function timidreceipt($con){
    $sql="select Max(Receipt_ID) as max from receipt";
    $result=mysqli_query($con,$sql);
    $kq=mysqli_fetch_assoc($result);
    return $kq;
}
function getspbyid($con,$id){
    $sql_sp="select * from product where Product_ID=$id";
    $result_getid=mysqli_query($con,$sql_sp);
    $getsp=mysqli_fetch_assoc($result_getid);
    return $getsp;
}

 if(isset($_POST['thanhtoan'])){
    echo '<script>  document.getElementById("receipt").style.display="none";</script>';
    $username=$_SESSION['user'];
   $sql_user="select * from customer where Customer_UserName='$username'";
   $result_user=mysqli_query($conn,$sql_user);
   $getUser_insert=mysqli_fetch_assoc($result_user);

    $cus_id=$getUser_insert["Customer_ID"];
    $date_today=date('Y-m-d H:i:s') ;
   
    $note=$_POST['note_shop'];
    $status=1;
    $arr_list_sanpham=$_SESSION['listsanphamdangdat'];
    $tong=tinhtong($conn,$arr_list_sanpham);
    
    $pttt=$_POST['optradio'];
    
    if($note==""){
        $sql_inser_receipt="insert into receipt (Customer_ID, Receipt_Date, Receipt_Total, Receipt_Note, Receipt_Status,Receipt_Reason,Admin_ID,Receipt_Payment) values ( $cus_id,'$date_today',$tong,null,$status,null,null,'$pttt')";
    }
    else
    {
        $sql_inser_receipt="insert into receipt (Customer_ID, Receipt_Date, Receipt_Total, Receipt_Note, Receipt_Status,Receipt_Reason,Admin_ID,Receipt_Payment) values ( $cus_id,'$date_today',$tong,'$note',$status,null,null,'$pttt')";
    }
   
    if($add_cart=mysqli_query($conn,$sql_inser_receipt)){
        
        foreach($arr_list_sanpham as $id_sp){
            $sl=0;
            $sl=getslbyid($id_sp);
            $getidreceid=timidreceipt($conn);
            $getidvalue=$getidreceid['max'];
            $sp=getspbyid($conn,$id_sp);
            $sp_gia=$sp['Product_Price'];
            $sql_inser_detail="insert into receipt_detail( Receipt_ID, Product_ID, Detail_Quality, Detail_Price) values ($getidvalue,$id_sp,$sl,$sp_gia)";
            if($add_detail=mysqli_query($conn,$sql_inser_detail)){
                echo "<script>alert('Thành công');
                window.location='product.php';

                </script>";
                update_status_cart($arr_list_sanpham);
                unset($_SESSION['listsanphamdangdat']);

            }
        }
    }
 }


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../assests/user/css/payment.css?v=9" >


</head>
<body>
<form id="receipt" action="" method="post">
    <div class = "content">
        <div class = "address-area ">
            <div style="display: flex;">
                <span class="si si-location-pin location-icon"></span>
                <p id="txt-address">Địa chỉ nhận hàng</p>
            </div>
            <div class= "row">
                <div class ="col-3" id="customer-name"> <?php echo  $getUser_Login["Customer_Name"] ?> </div>
                <div class = "col-3" id="customer-phone"><?php echo  $getUser_Login['Customer_Phone']?> </div>
                <div class = "col-5" id="customer-address"> <?php echo  $getUser_Login['Customer_Address']?></div>
                <button type="button" class = " col-1 btn-change-address" data-bs-toggle="modal" data-bs-target="#modalChangeAddress">  Thay đổi</button>
            </div>
        </div>
        
        <div class="product-area">
            <div class ="row">
                <div class="col-6 th-name" > Sản phẩm</div>
                <div class="col-2 th-name"> Đơn giá</div>
                <div class="col-2 th-name"> Số lượng</div>
                <div class="col-2 th-name"> Thành tiền</div>
            </div>
            <?php
            $arr_sanpham=$_SESSION['listsanphamdangdat'];
             foreach($arr_sanpham as $id) {
            $sql="select * from product where Product_ID=$id";
            $sl=0;
            $sl=getslbyid($id);
            $result=mysqli_query($conn,$sql);
            $getProduct=mysqli_fetch_assoc($result);
            $listgiohang=$_SESSION['giohanglist'];
          
           
            
               
            ?>
            <div class="row order-item">
                <div class="col-6" style="display: flex;">
                    <div class="col-2">
                        <img  class="order-picture" src ="<?php echo $getProduct["Product_Image"]?>"> 
                    </div>
                    <div class="col-4 item-name" > <?php echo $getProduct["Product_Name"] ?></div>
                </div>
                <div class = "col-2 item-price"> <?php echo $getProduct['Product_Price']?></div>
              
                <div class = "col-2 item-quantity"><?php echo $sl ?></div>
                <div class = "col-2 item-total-price"><?php echo $sl*$getProduct["Product_Price"] ?></div>
              
            </div>
            <?php
                 
                
        
    }
            ?>
           

        <div class="infor-items">
            <div class="row">
                <div class="col-7">
                    <label>Lời nhắn</label>
                    <input name="note_shop" placeholder="  Lưu ý cho cửa hàng" class="note-shop"/>
                </div>
                <div class="col-5">
                    <div class="row">
                        <span  class="txt-label col-4">Đơn vị vận chuyển: </span>
                        <span class="col-6" style="margin-top:2%"> JSP (Miễn phí vận chuyển)</span>
                    </div>
                    
                </div>
            </div>
            <div class="row ">
                <div class="col-7">
                    <div class ="row payment-option">
                        <div class="col-4" style="font-weight: bold">Phương thức thanh toán</div>
                        <div class="col-8">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="Tiền mặt" checked>
                                <label class="form-check-label" for="radio1">Tiền mặt</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="Tài khoản ngân hàng">
                                <label class="form-check-label " for="radio2">Tài khoản ngân hàng</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class=" row ">
                        <span class="col-4 txt-label">Số lượng sản phẩm:</span>
                        <span class="col-4" style=" font-weight:100 !important; margin-top:2%" > <?php  echo tinhtongsl()?>  </span>
                    </div>
                    <div  class="row">
                        <span class="col-4 txt-label"> Tổng giá tiền:</span>
                        <span class="col-4" style="font-weight:100 !important; margin-top:2%"><?php echo tinhtong($conn,$arr_sanpham)?> đ</span>    
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="btn-order-area">
                    <button name="thanhtoan" type="submit" id="btn-order">Thanh Toán</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    <?php include 'footer.php' ?>

    <!-- The Modal -->
<div class="modal" id="modalChangeAddress">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Vui lòng nhập địa chỉ giao hàng của bạn</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <input type="text" class="form-control" id="change-customer-address" placeholder="Địa chỉ" >
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn-modal-change-address" data-bs-dismiss="modal">Thay đổi</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</body>
</html>
<script src="../../assests/user/js/swal/swalNotification.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script><?php require '../../assests/user/js/payment.js' ?></script>

