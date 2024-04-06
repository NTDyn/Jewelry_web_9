<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link  type="text/css" href= "../../assests/admin/css/bootstrap/bootstrap.min.css"  rel="stylesheet">
    <link  type="text/css"  href="../../assests/admin/css/header_ad.css?v=7"  rel="stylesheet"> 
    <link  type="text/css" href="../../assests/admin/css/fonts/font-awesome.min.css" rel="stylesheet">
    <link  type="text/css" href="../../assests/admin/css/iconfonts/icons.css" rel="stylesheet">
    <link  type="text/css" href="../../assests/admin/css/iconfonts/plugin.css" rel="stylesheet">
</head>
<body>
  <div class = "header-ad">
    <div class="sidebar navbar" id="sidebar-header">
      <div class="btn-moveNav-area">
        <a class="navbar-brand " id="logo-area">
          <img src="../../image/logo-footer.png" id="logo" alt="logo-index" >
        </a>
        <button class="fa fa-eercast move-sidebar" onclick="moveNav()"></button>
      </div>
      <a href="#" class="fa fa-cubes sidebar-category" id="sidebar-first">
        <span class="item-sidebar">Category</span></a>
      <a href="#" class="si si-grid sidebar-category" id="sidebar-second">
        <span class="item-sidebar">Product</span>
      </a>
      <a href="#" class="si si-people sidebar-category" id="sidebar-third">
        <span class="item-sidebar">Customer</span>
      </a>
      <a href="#" class="si si-notebook sidebar-category" id="sidebar-fourth" >
        <span class="item-sidebar">Bill</span>
      </a>
    </div>
    <div id="content">
      <nav class="navbar navbar-expand-sm">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav ">
              <li class="nav-item item-header dropdown header-user">
                <button class="nav-link user-area" data-bs-toggle="dropdown">
                  <span class="name-user">
                    <span>User name</span> 
                  </span>
                  <span class="img-user-area">
                    <img src="../../image/img-user.png" class="img-user">
                  </span>
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../../views/user/contact.php">Liên hệ</a></li>
                  <li><a class="dropdown-item" href="#">FQS</a></li>
                </ul>
              </li>
            </ul>
          </div>
      </nav>
    </div>
  </div>

</body>
</html>
<script><?php require("../../assests/admin/js/jquery.min.js"); ?></script>
<script><?php require("../../assests/admin/js/bootstrap/bootstrap.bundle.min.js");?></script>    
<script><?php require("../../assests/admin/js/header.js"); ?></script>