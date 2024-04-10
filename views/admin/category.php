<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assests/admin/css/category.css?v=4">
</head>
<body>
    <?php include 'header.php'?>

    <div class=" content ">
        <!--Card of category-->
        <div class="row cate-statistical">
            <div class="col-2 category-card ">
                <div class="card-header">
                    <div class="name-category">Hoa tai</div>
                </div>
                <div class="card-body row" >
                    <div class="col-7 total-number">Số lượng </br>
                        <span class="number-area">150 </span>
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
                        <span class="number-area">150 </span>
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
                        <span class="number-area">150 </span>
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
                        <span class="number-area">150 </span>
                    </div>
                    <div class="chart-icon-area col-5">
                        <span class="fa fa-bar-chart chart-icon"></span>
                    </div>
                </div>
            </div>
        </div>
        <!--END Card of category-->

        <!--Table statistical-->
        <div class="table-category-area"> 
            <div class="title-table-area">
                <span id="title-table">Danh sách loại sản phẩm</span>
            </div>
            <table class="table-category">
                <tr>
                    <th>STT</th>
                    <th>LOẠI SẢN PHẨM</th>
                    <th>SỐ LƯỢNG</th>
                    <th>TRẠNG THÁI</th>
                    <th>TÍNH NĂNG</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Dây chuyền</td>
                    <td>150</td>
                    <td>Hoạt động</td>
                    <td>
                        <button class="btn-edit">
                            <span class="fa fa-pencil-square-o "></span>
                        </button>
                        <button class="btn-remove">
                            <span class="fa fa-remove"></span>
                        </button>
                        
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Dây chuyền</td>
                    <td>150</td>
                    <td>Hoạt động</td>
                    <td>
                        <button class="btn-edit">
                            <span class="fa fa-pencil-square-o "></span>
                        </button>
                        <button class="btn-remove">
                            <span class="fa fa-remove"></span>
                        </button>
                        
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Dây chuyền</td>
                    <td>150</td>
                    <td>Hoạt động</td>
                    <td>
                        <button class="btn-edit">
                            <span class="fa fa-pencil-square-o "></span>
                        </button>
                        <button class="btn-remove">
                            <span class="fa fa-remove"></span>
                        </button>
                        
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Dây chuyền</td>
                    <td>150</td>
                    <td>Hoạt động</td>
                    <td>
                        <button class="btn-edit">
                            <span class="fa fa-pencil-square-o "></span>
                        </button>
                        <button class="btn-remove">
                            <span class="fa fa-remove"></span>
                        </button>
                        
                    </td>
                </tr>
            </table>
        </div>
        <!--End Table statistical-->

        <!-- Category chart -->
        <div class="revenue-chart-area ">
            <canvas id="revenueChart" ></canvas>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>
<script src="../../assests/admin/js/chart/chart.js"></script>
<script src="../../assests/admin/js/category.js?v=3"></script>
