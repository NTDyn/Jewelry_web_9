<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Serena Jewelry</title>
  
    <link  type="text/css" href= "../../assests/user/css/bootstrap/bootstrap.min.css"  rel="stylesheet">
    <link  type="text/css"  href="../../assests/user/css/header.css?v=7"  rel="stylesheet"> 
    <link  type="text/css" href="../../assests/user/css/fonts/font-awesome.min.css" rel="stylesheet">
    <link  type="text/css" href="../../assests/user/css/iconfonts/icons.css" rel="stylesheet">
    <link  type="text/css" href="../../assests/user/css/iconfonts/plugin.css" rel="stylesheet">

</head>
<body>
      <div class = "header container">
            <nav class="navbar navbar-expand-sm">
                    <a class="navbar-brand" id="logo-area" href="../../views/user/index.php" >
                        <img src="../../image/logo.png" class="rounded-pill" id="logo" alt="logo-index" >
                    </a>
                    <div class="row cart-avata">
                            <div class="col-5 user-area dropdown row" > 
                              <div class="fa fa-user " id="icon-user" data-bs-toggle="dropdown"><span id="user" >
                              <?php 
                                session_start();
                                if(isset($_SESSION["user"])){
                                  echo $_SESSION["user"];
                                }else{
                                  echo "User";
                                }
                              ?>
                              </span></div>
                                  <ul class="dropdown-menu">
                                  <?php 
                                    if(isset($_SESSION["user"])){
                                      echo '<li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>';
                                      echo '<li><a class="dropdown-item" href="infor_personal.php">Thông tin tài khoản</a></li>';
                                    }else{
                                      echo '<li><a class="dropdown-item" href="login.php">Đăng nhập</a></li>';
                                    }
                                  ?>
                                    
                                    <li><a class="dropdown-item" href="../../views/user/historyOrder.php">Đơn mua</a></li>
                                  </ul>
                            </div>
                            <div class="col-7 cart-area " data-bs-toggle="modal" data-bs-target="#modal-cart">
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
                            <li class="nav-item item-header subnav ">
                              <div class="nav-link  link-item ">
                                <a href="../../views/user/collection.php" class="link-item" >Bộ sưu tập </a>
                                
                                <div class="subnav-content">
                                  <div class="row">
                                    <div class="col-3 collection-nav" >
                                      <a href="collection1.php" style="text-decoration: none !important;">
                                        <div class="collection-nav-img-area">
                                          <img src="../../image/nhan_cau_hon.jpg" class="collection-nav-img">
                                        </div>
                                          <p class="title-clt">Bộ sưu tập nhẫn cầu hôn 2024</p>
                                      </a>
                                    </div>
                                    <div class="col-3 collection-nav">
                                      <div class="collection-nav-img-area">
                                        <img src="../../image/vong_tay.jpg" class="collection-nav-img">
                                      </div>
                                        <p class="title-clt">Bộ sưu tập vòng tay mùa hè 2024</p>
                                    </div>
                                    <div class="col-3 collection-nav">
                                        <div class="collection-nav-img-area">
                                          <img src="../../image/day_chuyen.jpg" class="collection-nav-img">
                                        </div>
                                        <p class="title-clt">Bộ sưu tập dây chuyền đá quý 2024</p>
                                    </div>
                                    <div class="col-3 collection-nav">
                                        <div class="collection-nav-img-area">
                                          <img src="../../image/hoa_tai.jpg" class="collection-nav-img">
                                        </div>
                                        <p class="title-clt">Bộ sưu tập hoa tai Á Đông 2024</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="nav-item item-header">
                              <a class="nav-link link-item" href="../../views/user/product.php">Sản phẩm</a>
                            </li>
                            <li class="nav-item  item-header dropdown ">
                                <button type="button" class="nav-link link-item" data-bs-toggle="dropdown">
                                  Về chúng tôi
                                </button>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="../../views/user/contact.php">Liên hệ</a></li>
                                  <li><a class="dropdown-item" href="#">FQS</a></li>
                                </ul>
                            </li>    
                          </ul>
                          <form method="get" class="d-flex nav-itemx" id="form-search">
                            <input class="form-control me-2 w2-input search-value" type="text" placeholder="Search" name="searchValue" value="">
                            <button name="search_sp" class="si si-magnifier" type="button" id="btn-search" type="submit"></button>
                          </form>
                      </div>
                    </div>
            </nav>
        </div>

  <!-- MODAL SHOPPING CART-->
    <div class="shopping-cart">

        <!-- The Modal -->
        <div class="modal fade" id="modal-cart">
          <div class="modal-dialog modal-xl" >
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Giỏ hàng</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
               
              <!-- Modal body -->
              <form action="payment.php" method="post">
               
               <div class="modal-body"> 
               <?php 
                 include 'connect.php';
                 include '../../route/show_cart.php';
                 $html=getHTML($conn);
                  echo $html; ?> 
                <!-- <div class="row item-product-cart">
                  <div class="col-2">
                    <img src="../../image/necklace.jpg" class="img-product-cart">
                  </div>
                  <div class="col-3 name-product-cart">Day chuyen ngoc trai</div>
                  <div class="col-2 color-product-cart">
                    <img src="../../image/color-pink.jpg" class="col-1 color-prd">
                  </div>
                  <div class="col-2">
                    <button class="fa fa-minus minus-btn" ></button>
                    <span class="quality-product-cart">1</span>
                    <button  class="fa fa-plus plus-btn"></button>
                  </div>
                  <div class="col-1 price-product-cart">1000000</div>
                  <div class="col-1"><input name=ch type="checkbox" ></div>  -->
             
                  <!-- <div  class="col-1 fa fa-no-check-square-o"></div> -->
                  <!-- <div class="col-1 fa fa-remove"></div>
                </div> -->

               
              </div>

             

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="submit" name="btn_muahang" class=" btn-buy">
                  <a  class="payment-page"> Mua hàng</a>
                </button>
              </div>
              </form>

            </div>
          </div>
        </div>
    </div>
  <!--END MODAL CART-->


  

</body>
</html> 
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

</script>
<script><?php require("../../assests/user/js/jquery.min.js"); ?></script>
<script><?php require("../../assests/user/js/bootstrap/bootstrap.bundle.min.js");?></script>    
<script><?php require("../../assests/user/js/cart.js"); ?></script>
<script src="../../assests/admin/js/swal/swalNotification.js"></script>
<script><?php require("../../assests/user/js/search.js"); ?></script>
<?php 

?>
       