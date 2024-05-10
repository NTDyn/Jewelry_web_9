<?php
 include 'header.php';
include 'connect.php';
$arr_id_select=[];
if(isset($_POST['btn_muahang'])){
   if(isset($_POST['id_select'])){
    // echo "<scritp> alert('checkselect')</script>";
    foreach($_POST['id_select'] as $id){
    //  update_status_cart($id);
    array_push($arr_id_select,$id);
    
    }
   }else{
    echo "<script> 
    alert('Vui lòng chọn sản phẩm');
   window.location='product.php';
    </script>";
   }
   $_SESSION['listsanphamdangdat']=$arr_id_select;

  
   $username=$_SESSION['user'];
   $sql="select * from customer where Customer_UserName='$username'";
   $result=mysqli_query($conn,$sql);
   $getUser=mysqli_fetch_assoc($result);
 
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
    if($note==""){
        $sql_inser_receipt="insert into receipt (Customer_ID, Receipt_Date, Receipt_Total, Receipt_Note, Receipt_Status) values ( $cus_id,'$date_today',$tong,null,$status)";
    }
    else
    {
        $sql_inser_receipt="insert into receipt (Customer_ID, Receipt_Date, Receipt_Total, Receipt_Note, Receipt_Status) values ( $cus_id,'$date_today',$tong,$note,$status)";
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
    <link rel="stylesheet" href="../../assests/user/css/payment.css?v=4" >
    
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
                <div class ="col-3" id="customer-name"> <?php echo $getUser["Customer_Name"] ?> </div>
                <div class = "col-3" id="customer-phone"><?php echo $getUser['Customer_Phone']?> </div>
                <div class = "col-5" id="customer-address"> <?php echo $getUser['Customer_Address']?></div>
                <button class = " col-1"> Thay đổi</button>
            </div>
        </div>
        
        <div class="product-area">
            <div class ="row">
                <div class="col-6 th-name" > Sản phẩm</div>
                <div class="col-2 th-name"> Đơn giá</div>
                <div class="col-2 th-name"> Số lượng</div>
                <div class="col-2 th-name"> Thành tiền</div>
            </div>
            <?php foreach($arr_id_select as $id) {
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
                <div class="col-5">
                    <label>Lời nhắn</label>
                    <input name="note_shop" placeholder="Lưu ý cho cửa hàng" class="note-shop"/>
                </div>
                <div class="col-7">
                    <span>Đơn vị vận chuyển: JSP</span>
                    <span>56.000</span>
                </div>
            </div>
            <div class="row">
                <div id="total-area-price">Tổng giá tiền
                    <span> <?php  echo '('.count($arr_id_select)?>  sản phẩm): </span>
                    <span><?php echo tinhtong($conn,$arr_id_select)?></span>    
                    <span>
                       
                            <button name="thanhtoan" type="submit">Thanh Toán</button>
                      
                    </span>
                </div>

            </div>
        </div>
    </div>
    </form>
    <?php include 'footer.php' ?>
</body>
</html>
<script src="../../assests/user/js/swal/swalNotification.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>

