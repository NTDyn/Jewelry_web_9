<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="../../assests/admin/css/customer.css?v=10">
</head>
<body>
    <?php include 'header.php' ?>
    <div class ="content">
        <div id ="table-customer-area">
            <div class="tb-title">
                <p>Quản lý khách hàng</p>
            </div>
            <table id="customer-table">
                <thead>
                    <th>Mã</th>
                    <th> Tên khách hàng</th>
                    <th> Tên tài khoản</th>
                    <th> Liên hệ</th>
                    <th> Email</th>
                    <th> Địa chỉ </th>
                    <th> Trạng thái </th>
                    <th> Tính năng</th>
                </thead>
                <tbody id="list-customer">

                </tbody>
            </table>
        </div>
       
    </div>

    <!-- The Modal add customer -->
        <div class="modal fade" id="modal-add">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header ">
                        <button type="button" class="btn-close " id="btn-modal-close" data-bs-dismiss="modal" ></button>
                        <div class="modal-img-area">
                            <img id="modal-img" src="../../image/prince-jewelry.jpg" style="width: 100%">
                        </div></br>

                        <h4 class="modal-title ">Thêm khách hàng mới</h4>
                       
                        
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                       <form method = "post" id="add_form" >
                            <input type="hidden" value="add" name="action">
                            <p class=" error-main error-notify" style="text-align: center;"></p>
                            <div class="row form-line">
                                <label class="col-4 form-label" >Tên khách hàng <span style="color:red">*</span> </label>
                                <div class="col-6">
                                    <input type="text" class="form-control" name = "customer-name" required >       
                                    <p class=" error-name error-notify"></p>
                                </div>
                            </div>
                            <div class="row form-line">
                                <label class="col-4 form-label" > Liên hệ <span style="color:red">*</span> </label>
                                <div class="col-6">
                                    <input type="phone" class="form-control" name = "customer-phone">
                                    <p class=" error-phone error-notify"></p>
                                </div>
                            </div>
                            <div class="row form-line">
                                <label class="col-4 form-label" >Địa chỉ <span style="color:red">*</span> </label>
                                <div class="col-6">
                                    <input type="text" class="form-control" name = "customer-address" />
                                    <p class=" error-address error-notify"></p>
                                </div>
                            </div>
                            <div class="row form-line">
                                <label class="col-4 form-label" >Email <span style="color:red">*</span> </label>
                                <div class="col-6">
                                    <input type="email" class="form-control" name = "customer-email"/>
                                    <p class=" error-email error-notify"></p>
                                </div>
                            </div>
                            <div class="row form-line">
                                <label class="col-4 form-label" >Tên đăng nhập <span style="color:red">*</span></label>
                                <div class="col-6">
                                    <input type="text" class="form-control" name = "customer-username"  />
                                    <p class=" error-username error-notify"></p>
                                </div>
                            </div>
                            <div class="row form-line">
                                <label class="col-4 form-label" >Mật khẩu <span style="color:red">*</span> </label>
                                <div class="col-6">
                                    <input type="pwd" class="form-control" name = "customer-password" />
                                    <p class=" error-password error-notify"></p>
                                </div>
                            </div>
                            <div class="row form-line">
                                <label class="col-4 form-label">Hoạt động </label>
                                <div class="col-6 ">
                                    <label class=" switch">
                                        <input type="checkbox"  name="btnActive" id="btnActive">
                                        
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>

                        <!-- Modal footer -->
                    
                            <div class="modal-footer">
                                <button class="btn" id="btn-modal-add" >Thêm</button>
                            </div>
                       </form>
                    </div>   
                </div>
            </div>
        </div>
    <!-- End modal -->

    <!-- the modal remove and restart-->

             <!-- Modal Remove -->
             <div class="modal" id="modalRemove">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn-close " data-bs-dismiss="modal"></button>
                        <h4 class="modal-title">Xóa khách hàng</h4>
                        
                    </div>

                    <!-- Modal body -->
                    <form class="modal-body" method="post" id="remove-form">
                        <input type="hidden" name = "action" value="remove">
                        <input type="hidden" id="id_remove" name='id_remove'  />
                        <p>Bạn có chắc chắn muốn xóa khách hàng này không?</p>
                    

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-modal-remove" data-bs-dismiss="modal">Xóa</button >
                            <button type="button" class="btn btn-danger " data-bs-dismiss="modal" >Hủy</button>
                        </div>
                    </form>        
                    </div>
                </div>
            </div>

            <!-- Modal Restart -->
            <div class="modal" id="modalRestart">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn-close " data-bs-dismiss="modal"></button>
                        <h4 class="modal-title">Khôi phục tài khoản khách hàng</h4>
                    </div>

                    <!-- Modal body -->
                    <form class="modal-body" method="post" id="restart-form">
                        <input type="hidden" name = "action" value = "restart">
                        <input type="hidden" id="id_restart" name='id_restart'  />
                        <p>Bạn có chắc chắn muốn khôi phục hoạt động cho khách hàng này không?</p>
                    

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-modal-restart" data-bs-dismiss="modal">Khôi phục</button >
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                        </div>
                    </form>        
                    </div>
                </div> 
            </div>
        <!--End Modals-->

        <!-- The Modal edit customer -->
        <div class="modal fade" id="modalEdit">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header ">
                        <button type="button" class="btn-close " id="btn-modal-close" data-bs-dismiss="modal" ></button>
                        <div class="modal-img-area">
                            <img id="modal-img" src="../../image/prince-jewelry.jpg" style="width: 100%">
                        </div></br>

                        <h4 class="modal-title ">Chỉnh sửa thông tin khách hàng</h4>
                    
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body"> 
                       
                       <form method = "post" id="edit_form" >
                            <input type="hidden"  name="id_edit" id="id_edit">
                            <input type="hidden" value="edit" name="action">
                            <p class=" error-main error-notify" style="text-align: center;"></p>
                            <div class="row form-line">
                                <label class="col-4 form-label" >Tên khách hàng <span style="color:red">*</span></label>
                                <div class="col-6">
                                    <input type="text" class="form-control" name = "customer-edit-name" id="customer-edit-name" >
                                    <p class=" error-name error-notify"></p>
                                </div>
                                
                            </div>
                            <div class="row form-line">
                                <label class="col-4 form-label" > Liên hệ <span style="color:red">*</span></label>
                                <div class="col-6">
                                    <input type="text" class="form-control" name = "customer-edit-phone" id="customer-edit-phone" required >
                                    <p class=" error-phone error-notify"></p>
                                </div>
                            </div>
                            <div class="row form-line">
                                <label class="col-4 form-label" >Địa chỉ <span style="color:red">*</span></label>
                                <div class="col-6">
                                    <input type="text" class="form-control" name = "customer-edit-address"  id= "customer-edit-address" required/>
                                    <p class=" error-address error-notify"></p>
                                </div>
                            </div>
                            <div class="row form-line">
                                <label class="col-4 form-label" >Email <span style="color:red">*</span></label>
                                <div class="col-6">
                                    <input type="email" class="form-control" name = "customer-edit-email" id = "customer-edit-email"  />
                                    <p class=" error-email error-notify"></p>
                                </div>
                            </div>
                            <div class="row form-line">
                                <label class="col-4 form-label" >Tên đăng nhập <span style="color:red">*</span></label>
                                <div class="col-6">
                                    <input type="text" class="form-control" name = "customer-edit-username" id= "customer-edit-username" required />
                                </div>
                            </div>

                        <!-- Modal footer -->
                    
                            <div class="modal-footer">
                                <button type="button" class="btn" id="btn-modal-edit" >Chỉnh sửa</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                            </div>
                       </form>
                    </div>   
                </div>
            </div>
        </div>
    <!-- End modal -->

    <?php include 'footer.php'?>
</body>
</html>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script> <?php require '../../assests/admin/js/customer.js' ?> </script>