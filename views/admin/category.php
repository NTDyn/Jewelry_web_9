<?php
    require '../../controllers/connect.php';

    $sql_nhan = "SELECT COUNT(*) as soluong1 FROM product WHERE Category_ID = '2'";
    $result_nhan = $conn->query($sql_nhan);   
    if ($result_nhan->num_rows > 0) {
        $row = $result_nhan->fetch_assoc();
        $row_nhan = $row['soluong1'];
    } 

    $sql_daychuyen = "SELECT COUNT(*) as soluong2 FROM product WHERE Category_ID = '1'";
    $result_daychuyen = $conn->query($sql_daychuyen);   
    if ($result_daychuyen->num_rows > 0) {
        $row = $result_daychuyen->fetch_assoc();
        $row_daychuyen = $row['soluong2'];
    }

    $sql_vong = "SELECT COUNT(*) as soluong3 FROM product WHERE Category_ID = '3'";
    $result_vong = $conn->query($sql_vong);   
    if ($result_vong->num_rows > 0) {
        $row = $result_vong->fetch_assoc();
        $row_vong = $row['soluong3'];
    }

    $sql_tai = "SELECT COUNT(*) as soluong4 FROM product WHERE Category_ID = '4'";
    $result_tai = $conn->query($sql_tai);   
    if ($result_tai->num_rows > 0) {
        $row = $result_tai->fetch_assoc();
        $row_tai = $row['soluong4'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assests/admin/css/category.css?v=1">
    <link rel="stylesheet" href="../../assests/admin/css/wow_init/anime.min.css?v=5">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css?v=1">
</head>
<?php 

?>
<body>
    <?php 
        include 'header.php';
        
    ?>
    
    
    <div class=" content ">
        <!--Card of category-->
        <div class="row cate-statistical g-0">
            <div class="col-2 category-card ">
                <div class="card-header">
                    <div class="name-category">Hoa tai</div>
                </div>
                <div class="card-body row" >
                    <div class="col-7 total-number">Số lượng </br>
                        <span class="number-area"><?php echo $row_tai ?> </span>
                    </div>
                    <div class="chart-icon-area col-5">
                        <span class="fa fa-bar-chart chart-icon"></span>
                    </div>
                </div>
            </div>
            <div class="col-2 category-card ">
                <div class="card-header">
                    <div class="name-category">Dây chuyền</div>
                </div>
                <div class="card-body row" >
                    <div class="col-7 total-number">Số lượng </br>
                        <span class="number-area"><?php echo $row_daychuyen ?> </span>
                    </div>
                    <div class="chart-icon-area col-5">
                        <span class="fa fa-bar-chart chart-icon"></span>
                    </div>
                </div>
            </div>
            <div class="col-2 category-card ">
                <div class="card-header">
                    <div class="name-category">Vòng tay</div>
                </div>
                <div class="card-body row" >
                    <div class="col-7 total-number">Số lượng </br>
                        <span class="number-area"><?php echo $row_vong ?> </span>
                    </div>
                    <div class="chart-icon-area col-5">
                        <span class="fa fa-bar-chart chart-icon"></span>
                    </div>
                </div>
            </div>
            <div class="col-2 category-card ">
                <div class="card-header">
                    <div class="name-category">Nhẫn</div>
                </div>
                <div class="card-body row" >
                    <div class="col-7 total-number">Số lượng</br>
                        <span class="number-area"><?php echo $row_nhan ?> </span>
                    </div>
                    <div class="chart-icon-area col-5">
                        <span class="fa fa-bar-chart chart-icon"></span>
                    </div>
                </div>
            </div>
        </div>
        <!--END Card of category-->

        <!--Table statistical-->
        <div class="table-category-area" > 
            <div class="title-table-area">
                <span id="title-table">Danh sách loại sản phẩm</span>
            </div>
            <div style="padding-left: 2%; padding-right: 2%;"  >
                <form method="post"  id="listCate"  name="listCate">
                    <input type ="hidden" name="action" value="read">
                    <input type ="hidden" name="arrCate" id="arrCate" value="">
                </form>
                <table class="table-category" id="myTable" >
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>MÃ LOẠI</th>
                            <th>LOẠI SẢN PHẨM</th>
                            <th>SỐ LƯỢNG</th>
                            <th>TRẠNG THÁI</th>
                            <th>TÍNH NĂNG</th>
                        </tr>
                    </thead>
                    <tbody id ="list-category">
<!--  -->
                    </tbody>

                </table>
            </div>
            
        </div>
        
        
        <!--End Table statistical-->

        <!-- the modal remove and restart-->

             <!-- Modal Remove -->
            <div class="modal" id="modalRemove">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn-close " data-bs-dismiss="modal"></button>
                        <h4 class="modal-title">Xóa loại sản phẩm</h4>
                        
                    </div>

                    <!-- Modal body -->
                    <form class="modal-body" method="post" id="remove-form">
                        <input type="hidden" name = "action" value="remove">
                        <input type="hidden" id="id_remove" name='id_remove'  />
                        <p>Bạn có chắc chắn muốn xóa loại sản phẩm này không?</p>
                    

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
                        <h4 class="modal-title">Khôi phục loại sản phẩm</h4>
                    </div>

                    <!-- Modal body -->
                    <form class="modal-body" method="post" id="restart-form">
                        <input type="hidden" name = "action" value = "restart">
                        <input type="hidden" id="id_restart" name='id_restart'  />
                        <p>Bạn có chắc chắn muốn khôi phục hoạt động cho loại sản phẩm này không?</p>
                    

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-modal-restart" data-bs-dismiss="modal">Khôi phục</button >
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                        </div>
                    </form>        
                    </div>
                </div> 
            </div>
        <!-- Category chart -->
        <div class="revenue-chart-area ">
            <canvas id="revenueChart" ></canvas>
        </div>
        <!-- End Chart -->

        <!-- The Modal add category -->
        <div class="modal fade" id="modal-add">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header ">
                        <button type="button" class="btn-close " id="btn-modal-close" data-bs-dismiss="modal" ></button>
                        <div class="modal-img-area">
                            <img id="modal-img" src="../../image/prince-jewelry.jpg">
                        </div></br>

                        <h4 class="modal-title ">Thêm mới loại sản phẩm</h4>
                       
                        
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                       <form method = "post" id="add_form" >
                            <input type="hidden" value="add" name="action">
                            <div class="row form-line">
                                <label class="col-4 form-label" >Tên thể loại</label>
                                <input type="text" class="col-6" name = "txtCategory" id="txtCategory"/>
                            </div>
                            <div class="row form-line">
                                <label class="col-4 form-label">Hoạt động</label>
                                <div class="col-6 ">
                                    <label class=" switch">
                                        <input type="checkbox" checked name="btnActive" id="btnActive">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>

                        <!-- Modal footer -->
                    
                            <div class="modal-footer">
                                <button class="btn" id="btn-modal-add" > Thêm </button>
                            </div>
                       </form>
                    </div>   
                </div>
            </div>
        </div>
        <!-- End modal -->

        <!-- Edit Category Modal -->
        <div class="modal fade" id="modalEdit">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header ">
                        <button type="button" class="btn-close " id="btn-modal-close" data-bs-dismiss="modal" ></button>
                        <div class="modal-img-area">
                            <img id="modal-img" src="../../image/prince-jewelry.jpg">
                        </div></br>

                        <h4 class="modal-title ">Chỉnh sửa loại sản phẩm</h4>
                       
                        
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form method = "post" id="edit-form" >
                            <input type="hidden" name="action" value="edit" >
                            <div class="row form-line">
                                <label class="col-4 form-label" >Mã loại sản phẩm</label>
                                <input type="number" class="col-6" id="id_edit_category" name = "id_edit_category" readonly />
                            </div>
                            <div class="row form-line">
                                <label class="col-4 form-label" >Tên thể loại</label>
                                <input type="text" class="col-6" name = "txt_edit_category" id="txt_edit_category"/>
                            </div>
                        </form>
                        <!-- Modal footer -->
                    
                        <div class="modal-footer">
                            <button class="btn"  id="btn-modal-edit"> Chỉnh sửa</button>    
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
        <!-- End Edit Modal-->
    </div>
    <?php include 'footer.php' ?>
</body>
</html>
<script src="../../assests/admin/js/chart/chart.js"></script>
<script src="../../assests/admin/js/category.js?v=5"></script>
<script src="../../assests/admin/js/swal/swalNotification.js"></script>
<script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
<script> <?php require '../../assests/admin/js/ajax/category_Ajax.js' ?> </script>



