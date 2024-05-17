<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serena Web</title>
    <link rel="stylesheet" href="../../assests/user/css/historyOrder.css?v=6"></link>
</head>
<body>

  
    <?php include 'header.php' ?>
    <div class="content">
        <input type="hidden" id="id-order" value="<?php if(isset($_SESSION["customer_id"])){
                echo $_SESSION["customer_id"];
            } ?>" > 
           
        </input>
        <div class="option-order">
            <ul class="nav nav-tabs justify-content-center row">
                <li class="col-2 nav-item option-order-item ">
                    <a class="nav-link option-name active"  id= "option-all" href="#">Tất cả</a>
                </li>
                <li class="col-2 nav-item option-order-item">
                    <a class="nav-link option-name" id= "option-wait" href="#">Chờ xác nhận</a>
                </li>
                <li class="col-2 nav-item option-order-item">
                    <a class="nav-link option-name" id= "option-confirm" href="#">Đang chuẩn bị hàng</a>
                </li>
                <li class="col-2 nav-item option-order-item">
                    <a class="nav-link option-name" id= "option-trans" href="#">Đang giao hàng</a>
                </li>
                <li class="col-2 nav-item option-order-item">
                    <a class="nav-link option-name" id= "option-finish" href="#">Hoàn thành</a>
                </li>
                <li class="col-2 nav-item option-order-item">
                    <a class="nav-link option-name" id= "option-cancel" href="#">Đã hủy</a>
                </li>
            </ul>
        </div>
        <div class="order-content">
            
            
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>
<script><?php require '../../assests/user/js/historyOrder.js' ?></script>