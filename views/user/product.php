<link  type="text/css"  href="../../assests/user/css/product.css?v=2"  rel="stylesheet"> 
<?php 
include 'header.php';
include 'connect.php';
// echo var_dump($_SESSION['user']);

?>
<div class="product-area">
<form action="" method="post">
<div class="row">
    <?php $sql="select * from product where Product_Status=1"; 
    $result_pr=mysqli_query($conn,$sql);
    while($row_pr=mysqli_fetch_assoc($result_pr)){
    ?>

    <div class="col-md-3 col-sm-6" style="margin-top: 10px; margin-bottom: 10px; " >
        <div class="product-grid product-item" >
            <input type="hidden" class="product-id" value="<?php echo $row_pr["Product_ID"] ?>">
            <div class="product-image">
                <a href="#" class="image">
                <img class="pic-1" style="width: 350px; height: 400px;" src=<?php echo "'".$row_pr['Product_Image']."'"?>>
                    <img class="pic-2"  style="width: 350px; height: 400px;" src=<?php echo "'".$row_pr['Product_Image']."'"?>>
                </a>
                <a href="#" class="product-like-icon" data-tip="Yêu Thích">
                    <i class="fa fa-heart"></i>
                </a>
                <ul class="product-links">
                    <li><a href="#"  ><i class="fa fa-eye"></i></a></li>
                    <!-- <li><button class="fa fa-shopping-cart "></button></li> -->
                    <li ><a href="cart.php?id_sp=<?php echo $row_pr["Product_ID"] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                    <li><a href="#" ><i class="fa fa-random"></i></a></li>
                </ul>
            </div>
            <div class="product-content">
                <h3 class="title"><a href="#"><?php echo $row_pr['Product_Name'] ?></a></h3>
                <div class="price"><?php echo $row_pr['Product_Price'] ?></div>
               
            </div>
        </div>
    </div>

<?php } 
  
?> 



</div>
</form>
</div>

<!-- The Modal -->
<div class="modal" id="modalDetail">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title modal-product-name">Day chuyen</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
            <div class="col-5">
                <img class="modal-product-image" src="../../image/background_login.jpg">
            </div>
            <div class="col-7" >
                <div style="font-size: 18px" >Mô tả: <span class="modal-product-describe" ></span></div>
                <div class="modal-product-price"></div>
                <hr class="modal-line">
                <div class="row">
                    <div class="col-5 "><span class="product-modal-icon fa fa-rotate-left"></span>Đổi miễn phí trong 72 giờ</div>
                    <div class="col-5 "><span class="product-modal-icon fa fa-gittip"></span>Bảo hành trọn đời</div>
                </div>
                <div class="row">
                    <div class="col-5 "><span class="product-modal-icon fa fa-handshake-o"></span>Trả góp 0%</div>
                    <div class="col-5 "><span class="product-modal-icon fa fa-send"></span>Giao hàng miễn phí toàn quốc</div>
                </div>
            </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="modal-product-add-cart" data-bs-dismiss="modal">Thêm vào giỏ hàng</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script><?php include '../../assests/user/js/product.js'?></script>