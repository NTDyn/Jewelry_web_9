<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
    <link  type="text/css" href= "../../assests/user/css/bootstrap/bootstrap.min.css"  rel="stylesheet">
    <link  type="text/css"  href="../../assests/user/css/header.css"  rel="stylesheet"> 
    <link  type="text/css" href="../../assests/user/css/fonts/font-awesome.min.css" rel="stylesheet">
    <link  type="text/css" href="../../assests/user/css/iconfonts/icons.css" rel="stylesheet">
    <link  type="text/css" href="../../assests/user/css/iconfonts/plugin.css" rel="stylesheet">
    
</head>
<body>
<div class = "header">
            <nav class="navbar navbar-expand-sm">
                <div class="container" >
                    <a class="navbar-brand" id="logo-area" href="../../views/user/index.php" >
                        <img src="../../image/logo.png" class="rounded-pill" id="logo" alt="logo-index" >
                    </a>
                    <div class="row cart-avata">
                            <div class="col-5 user-area ">
                              <div class="fa fa-user " href="#" id="icon-user">
                                <span id="user"><a href="login.php">User</a></span>
                              </div>
                            </div>
                            <div class="col-7 cart-area ">
                              <div class="fa fa-shopping-bag " href="#" id="icon-cart"> </div>
                              <span id="quality-cart">0</span>
                              <span id="cart">Giỏ hàng</span>
                            </div>
                    </div>
                    <div class="row main-items">
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                          <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="collapsibleNavbar">
                          <ul class="navbar-nav">
                            <li class="nav-item item-header">
                              <a class="nav-link  link-item" href="#">Bộ sưu tập</a>
                            </li>
                            <li class="nav-item item-header">
                              <a class="nav-link link-item" href="#">Sản phẩm</a>
                            </li>
                            <li class="nav-item item-header ">
                              <?php echo ' <a class="nav-link link-item" href="../../views/user/contact.php">Về chúng tôi</a>' ?>
                            </li>    
                          </ul>
                          <form class="d-flex nav-itemx" id="form-search">
                            <input class="form-control me-2 w2-input" type="text" placeholder="Search">
                            <button class="si si-magnifier" type="button" id="btn-search"></button>
                          </form>
                          
                      </div>
                    </div>
                    
                </div>
            </nav>
        </div>
        
</body>
</html> 
<script><?php require("../../assests/user/js/jquery.min.js"); ?></script>
<script><?php require("../../assests/user/js/bootstrap/bootstrap.bundle.min.js");?></script>    

       