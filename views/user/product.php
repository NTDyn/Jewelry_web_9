<link  type="text/css"  href="../../assests/user/css/product.css?v=3"  rel="stylesheet"> 
<?php 
include 'header.php';
include 'connect.php';
// echo var_dump($_SESSION['user']);

?>
 <div id="message_add_cart" class="alert alert-success" style="display: none;">
                                Thêm vào giỏ hàng thành công
                            </div>
 <div id="warning_add_cart"  class="alert alert-warning" style="display: none;">
                                Thêm vào giỏ hàng không thành công
  </div>
                            
<div class="row product-area">



</div>


<!-- The Detail Modal -->
<div class="modal" id="modalDetail">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content" id="content" >
    <!-- <form action="cart_2" method="post" > -->
      <!-- Modal Header -->
      <!-- <div class="modal-header">
        <h4 class="modal-title modal-product-name"></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div> -->

      <!-- Modal body -->
      <!-- <div class="modal-body">
        <div class="row">
            <div class="col-5">
                <img class="modal-product-image" src="../../image/background_login.jpg">
            </div>
            <div class="col-7" >
                <div style="font-size: 18px" >Mô tả: <span class="modal-product-describe" ></span></div>
                <div class="modal-product-price"></div>
                <span>Số Lượng</span>
                <span > <input name="sl" class="modal-product-quality" type="number" value="1"></span>
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
      </div> -->

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button name="btn_mua" type="button" class="modal-product-add-cart" data-bs-dismiss="modal">Thêm vào giỏ hàng</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
      </form> -->
    </div>
  </div>
</div>


<script><?php include '../../assests/user/js/product.js'?></script>