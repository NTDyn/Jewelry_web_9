<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serena Web</title>
    <link rel="stylesheet" href="../../assests/admin/css/order.css?v=3">
    <!--Select2 css -->
    <link id="link6" href="../../assests/admin/js/select2/select2.min.css" rel="stylesheet" />

</head>
<body>

    <?php  include 'header.php' ?>;
    <div class="content">
        <div id="table-order-area">
            <div id ="tb-title">
                <p>Danh sách đơn hàng</p>
            </div>
            <table id="order-table">
                <thead>
                    <th>Mã đơn hàng</th>
                    <th>Mã khách hàng</th>
                    <th>Tổng tiền</th>
                    <th>Ngày đặt</th>
                    <th>Trạng thái</th>
                    <th>Tính năng</th>
                </thead>
                <tbody id="list-order">

                </tbody>
            </table>
        </div>

            
  
    </div>

    <!-- The Modal detail order -->
    <div class="modal fade" id="modalDetail">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header ">
                        <button type="button" class="btn-close btn-modal-close" data-bs-dismiss="modal" ></button>
                        <div class="modal-img-area">
                            <img id="modal-img" src="../../image/prince-jewelry.jpg" style="width: 100%">
                        </div></br>

                        <h4 class="modal-title ">Thông tin khách hàng</h4>
                    
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body"> 
                       
                       <form method = "post" id="order_form" >
                            <input type="hidden" value="read" name="action">
                            <div class="customer-detail-infor">
                                <div class="row form-line">
                                    <label class="col-2 form-label" >Mã đơn hàng: </label>
                                    <div class="col-4">
                                        <span  id="receipt-id" ></span>
                                    </div>
                                    <label class="col-2 form-label" >Ngày đặt: </label>
                                    <div class="col-4">
                                        <span  id="receipt-date" ></span>
                                    </div>
                                </div>
                                <div class="row form-line">
                                    <label class="col-2 form-label" > Mã khách hàng: </label>
                                    <div class="col-4">
                                        <span id="customer-id"  > </span>
                                    </div>
                                    <label class="col-2 form-label" >Tên khách hàng: </label>
                                    <div class="col-4">
                                        <span id= "customer-name"></span>
                                    </div>
                                </div>
                                <div class="row form-line">
                                    <label class="col-2 form-label" >Địa chỉ khách hàng: </label>
                                    <div class="col-4">
                                        <span id = "customer-address"  ></span>
                                    </div>
                                    <label class="col-2 form-label" >Liên hệ:</label>
                                    <div class="col-4">
                                        <span id= "customer-phone"></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row form-line">
                                <h4 id="label-product" >Thông tin sản phẩm</h4>
                            </div>
                            <div class="product-order">
                                <div class="row form-line product-order-title">
                                    <label class="col-3 " >Mã sản phẩm</label>
                                    
                                    <label class="col-3 " >Tên sản phẩm</label>
                                    
                                    <label class="col-3 " >Đơn giá</label>
                                    
                                    <label class="col-3 " >Số lượng</label>
                                    
                                </div>
                                <div class="product-order-infor">
                                </div>
                            </div>

                        <!-- Modal footer -->
                            <div class="footer-detail">
                                <div class="row ">
                                    <div class="col-9"  style ="color:red; font-weight: bold; padding-left:5%">Ghi chú: <span id="order-note"></span> </div>
                                    <div class="col-3 " style ="color:red; font-weight: bold;">Tổng cộng: <span id="receipt-total"></span></div>
                                </div>
                               
                            </div>
                       </form>
                    </div>   
                </div>
            </div>
        </div>
    <!-- End modal -->

    <!-- The Modal CONFIRM  -->
    <div class="modal fade" id="modalConfirm">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Xác nhận đơn hàng</h4>
                <button type="button" class="btn-close btn-modal-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Bạn có chắc chắn muốn xác nhận đơn hàng #<span id="id-confirm"></span> ?
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn-confirm" data-bs-dismiss="modal">Xác nhận</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
    </div>

     <!-- The Modal Delivered  -->
    <div class="modal fade" id="modalDelivered">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Chuyển giao đơn hàng</h4>
                <button type="button" class="btn-close btn-modal-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Bạn có chắc chắn muốn thay đổi trạng thái đơn hàng #<span id="id-delivered"></span> ?
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn-delivered" data-bs-dismiss="modal">Chuyển giao</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
    </div>

     <!-- The Modal Received  -->
     <div class="modal fade" id="modalReceived">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Đã giao đơn hàng</h4>
                <button type="button" class="btn-close btn-modal-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Bạn có chắc chắn muốn thay đổi trạng thái đơn hàng #<span id="id-received"></span> thành đã giao ?
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn-received " data-bs-dismiss="modal">Đã giao</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
    </div>

     <!-- The Modal Cancel  -->
     <div class="modal fade" id="modalCancel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Hủy đơn hàng</h4>
                <button type="button" class="btn-close btn-modal-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Bạn có chắc chắn muốn hủy đơn hàng #<span id="id-cancel"></span>  ?
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn-cancel-order " data-bs-dismiss="modal">Hủy đơn </button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
            </div>

            </div>
        </div>
    </div>

    <!-- The Modal add new order -->

    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade " id="modal-add" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-modal-close btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                    <h4 class="modal-title" id="myModalLabel">Thêm đơn hàng mới</h4>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" id="checkCustomer_form">
                    <fieldset style="display: block;">
                        <input type="hidden" value="checkCustomerInfor" name="action">
                                <p class=" error-main error-notify" style="text-align: center;"></p>
                                <div class="row form-line">
                                    <label class="col-3 form-label" > Số điện thoại <span style="color:red">*</span> </label>
                                    
                                    <label class="col-3 form-label  isVisible" >Tên khách hàng <span style="color:red">*</span> </label>
                                    
                                    <label class="col-3 form-label isVisible " >Địa chỉ <span style="color:red">*</span> </label>
                                    
                                    <label class="col-3 form-label isVisible" >Email <span style="color:red">*</span> </label>
                                    
                                </div>
                                <div class="row">
                                    <input type="hidden" name="customer-id" id="txt-id">
                                    <div class="col-3">
                                        <input type="phone" class="form-control" name = "customer-phone"  id="txt-phone" >
                                        <p class=" error-phone error-notify"></p>
                                    </div>
                                    <div class="col-3 isVisible">
                                        <input type="text" class="form-control isDisable" name = "customer-name" id="txt-name" >       
                                        <p class=" error-name error-notify"></p>
                                    </div>
                                    <div class="col-3 isVisible">
                                        <input type="email" class="form-control isDisable" name = "customer-email" id="txt-email"/>
                                        <p class=" error-email error-notify"></p>
                                    </div>
                                    <div class="col-3 isVisible">
                                        <input type="text" class="form-control " name = "customer-address" id= "txt-address"/>
                                        <p class=" error-address error-notify"></p>
                                    </div>
                                    
                                </div>
                    </fieldset>
                    </form>
                    

                    <div id="tb-selected-product-area">
                        <table id="tb-selected-product">
                            <thead>
                                <th></th>
                                <th>Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th></th>
                            </thead>
                            <tbody id="tb-product-body">
                                <tr class="cart-item">
                                    <td></td>
                                    <td>
                                        <select class="form-control select2-show-search" style="width: 100%" id="fix-selection">
                                            <option value="" disabled selected hidden>Please Choose...</option>
                                        </select>
                                    </td>
                                    <td class="product-price">0</td>
                                    <td>0</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>    
                
                    <div class="payment-infor-area row" >
                        <div class="col-6">
                            <div class ="row">
                                <div class="col-4 txt-label">Phương thức thanh toán</div>
                                <div class="col-8">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked>
                                        <label class="form-check-label" for="radio1">Tiền mặt</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                                        <label class="form-check-label " for="radio2">Tài khoản ngân hàng</label>
                                    </div>
                                </div>
                            </div>
                            <div class=" row" style="margin-top: 1%">
                                <label class="col-4 txt-label" for="comment">Lưu ý của khách hàng:</label>
                                <textarea class=" form-control col-8 " rows="5" id="comment" name="text-note"></textarea>
                            </div>
                        </div>
                        <div class="col-6" style ="padding-left: 10%">
                            <div class="row" style="margin-bottom: 3%">
                                <div class="col-5 txt-label">Đơn vị vận chuyển:</div>
                                <div class="col-7"> JSP</div>
                            </div>
                            <div class="row" style="margin-bottom: 3%">
                                <div class="col-5 txt-label">Số lượng sản phẩm: </div>
                                <div class="col-7"><span id="total-quantity">0</span></div>
                            </div>
                            <div class="row" style="margin-bottom: 3%">
                                <div class="col-5 txt-label">Tổng số tiền:</div>
                                <div class="col-7" id = "total-price" name="total-price" >0</div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class=" btn-order"  >Đặt hàng</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
    </div>

<div class="modal" id="confirm-add">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Bạn có chắc chắn?</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Bạn có chắc chắn muốn thêm đơn hàng?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" id=" btn-confirm-order" >Thêm đơn hàng</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>



     
    <?php  include 'footer.php' ?>
</body>
</html>

<script><?php require ("../../assests/admin/js/order.js") ?></script>
<script src="../../assests/admin/js/chart/chart.js?v=1"></script>
