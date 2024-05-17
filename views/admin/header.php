<?php   session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link  type="text/css" href= "../../assests/admin/css/bootstrap/bootstrap.min.css"  rel="stylesheet">
    <link  type="text/css"  href="../../assests/admin/css/header.css?v=2"  rel="stylesheet"> 
    <link  type="text/css" href="../../assests/admin/css/fonts/font-awesome.min.css" rel="stylesheet">
    <link  type="text/css" href="../../assests/admin/css/iconfonts/icons.css" rel="stylesheet">
    <link  type="text/css" href="../../assests/admin/css/iconfonts/plugin.css" rel="stylesheet">
    <link  type="text/css"  href="../../assests/admin/css/product.css"  rel="stylesheet"> 

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
</head>
<body>
  <div class = "header-ad">
    <div class="sidebar navbar" id="sidebar-header">
      <div class="btn-moveNav-area">
        <?php echo '<a class="navbar-brand " id="logo-area" href="../../views/admin/home.php">' ?>
          <img src="../../image/logo-footer.png" id="logo" alt="logo-index" >
        <?php echo '</a>' ?>
        <button class="fa fa-eercast move-sidebar" onclick="moveNav()"></button>
      </div>
      <?php echo '<a href="../../views/admin/category.php" class="fa fa-cubes sidebar-category" id="sidebar-first">'?>
        <span class="item-sidebar">Thể loại</span>
      <?php echo '</a>' ?>
      <a href="../../views/admin/product.php" class="si si-grid sidebar-category" id="sidebar-second">
        <span class="item-sidebar">Sản phẩm</span>
      </a>
      <a href="../../views/admin/customer.php" class="si si-people sidebar-category" id="sidebar-third">
        <span class="item-sidebar">Khách hàng</span>
      </a>
      <a href="../../views/admin/order.php" class="si si-layers sidebar-category" id="sidebar-fourth">
        <span class="item-sidebar">Đơn hàng</span>
      </a>
      <a href="../../views/admin/bill.php" class="si si-notebook sidebar-category" id="sidebar-fifth" >
        <span class="item-sidebar">Hóa đơn</span>
      </a>
    </div>
    <div id="content">
      <nav class="navbar navbar-expand-sm navbar-horizon">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav ">
              <li class="nav-item item-header dropdown header-user">
                <button class="nav-link user-area" data-bs-toggle="dropdown">
                  <span class="name-user">
                    <span>
                      <?php 
                      
                        if(isset($_SESSION["user"])){
                          echo $_SESSION["user"];
                        }else{
                          echo "Username";
                        }
                      ?>
                    </span> 
                  </span>
                  <span class="img-user-area">
                    <img src="../../image/img-user.png" class="img-user">
                  </span>
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../../views/admin/register.php">Đăng ký</a></li>
                  <li><a class="dropdown-item" href="../../views/user/logout.php">Đăng xuất</a></li>
                </ul>
              </li>
            </ul>
          </div>
      </nav>
      <!-- breakcumb-->
      <nav class="navbar navber-expand-sm features-header">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item" id="breadcrumb-first">Home<a href="../../views/admin/home.php"></a></li>
            <li class="breadcrumb-item" id="breadcrumb-second"><a href="#"></a></li>
          </ol>
        </nav>
        <ul class="navbar-nav feature-buttons row ">
            <li class="nav-item btn-support-area col-auto">
              <button class="btn-support">
                <span class= "fa fa-headphones" id="support-icon"></span>
                <span id="support-title">&nbsp;Hỗ trợ </span>
              </button>
            </li>
            <li class="nav-item btn-add-area col-auto">
              <button class="btn-add" data-bs-toggle="modal" data-bs-target="#modal-add">
                <span class= "fa fa-plus" id="add-icon"></span>
                <span id="add-title">&nbsp;Thêm mới</span>
              </button>
            </li>
        </ul>
      </nav>
      
      <div class="content-view"></div>
    </div>
  </div>

</body>
</html>
<script><?php require("../../assests/admin/js/jquery.min.js"); ?></script>
<script><?php require("../../assests/admin/js/bootstrap/bootstrap.bundle.min.js");?></script>    
<script><?php require("../../assests/admin/js/header.js"); ?></script>
<script><?php require("../../assests/admin/js/product.js"); ?></script>
<script src="../../assests/admin/js/swal/swalNotification.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<!--Select2 js -->
<script src="../../assests/admin/js/select2/select2.full.min.js"></script>
<script src="../../assests/admin/js/select2/select2.js?v=6"></script>
<!-- Script-->