<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" href="../../assests/admin/css/home.css?v=14" rel="stylesheet">
</head>
<body>
    <?php include('header.php') ?>
    <div class="content-customer content">
    <!-- Carousel -->

        <!-- The slideshow/carousel -->
        <div class="row mx-auto my-auto justify-content-center">
            <div id="demoCarousel" class="carousel slide" data-bs-ride="carousel" >
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="col-md-3">
                            <div class="card ">
                                <div class=" img-carousel-area"  style="background-color:#d4edff;">
                                    <div class="si si-drawer img-carousel" style="color: #1696f3;"></div>
                                </div>
                                
                                <div class="caption-carousel">
                                    <span class="title-carousel">Số lượng loại sản phẩm</span> </br>
                                    <span class="revenue-carousel">1200</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="col-md-3">
                            <div class="card">
                                <div class=" img-carousel-area"  style="background-color:#fffaeb">
                                    <div class="si si-grid img-carousel" style="color: #d9ce3f;"></div>
                                </div>
                                
                                <div class="caption-carousel">
                                    <span class="title-carousel">Số lượng sản phẩm</span> </br>
                                    <span class="revenue-carousel">1200</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="col-md-3">
                            <div class="card">
                                <div class=" img-carousel-area"  style="background-color:#fbe6f6">
                                    <div class="si si-people img-carousel" style="color: #d54cb4;"></div>
                                </div>
                                
                                <div class="caption-carousel">
                                    <span class="title-carousel">Số lượng khách hàng</span> </br>
                                    <span class="revenue-carousel">1200</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="col-md-3">
                            <div class="card">
                                <div class=" img-carousel-area"  style="background-color:#dcf7e3">
                                    <div class="si si-notebook img-carousel" style="color: #1ba53f;"></div>
                                </div>
                                
                                <div class="caption-carousel">
                                    <span class="title-carousel">Số lượng hóa đơn</span> </br>
                                    <span class="revenue-carousel">1200</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    <!-- End Carousel -->

    <!-- revenue of period -->
        <div class="revenue-period">
            <div class="row" style="margin: 0!important;">
                <div class = " col-2 card-revenue">
                    <div class="card-header">
                        <span class="card-revenue-title">Hôm nay</span>
                    </div>
                    <div class = "card-body">
                        <span class="card-revenue-quality">900</span> </br>
                        <span class="si si-graph"  style="color: red"></span>
                        <span class="card-sales">Sales</span>
                    </div>
                </div>
                <div class = " col-2 card-revenue">
                    <div class="card-header">
                        <span class="card-revenue-title">Hôm qua</span>
                    </div>
                    <div class = "card-body">
                        <span class="card-revenue-quality">900</span> </br>
                        <span class="si si-graph"  style="color: red"></span>
                        <span class="card-sales">Sales</span>
                    </div>
                </div>
                <div class = " col-2 card-revenue">
                    <div class="card-header">
                        <span class="card-revenue-title">Tuần trước</span>
                    </div>
                    <div class = "card-body">
                        <span class="card-revenue-quality">900</span> </br>
                        <span class="si si-graph"  style="color: red"></span>
                        <span class="card-sales">Sales</span>
                    </div>
                </div>
                <div class = "col-2 card-revenue">
                    <div class="card-header">
                        <span class="card-revenue-title">Tháng trước</span>
                    </div>
                    <div class = "card-body">
                        <span class="card-revenue-quality">900</span> </br>
                        <span class="si si-graph " style="color: red"></span>
                        <span class="card-sales">Sales</span>
                    </div>
                </div>
                <div class = "col-2 card-revenue">
                    <div class="card-header">
                        <span class="card-revenue-title">6 tháng trước</span>
                    </div>
                    <div class = "card-body">
                        <span class="card-revenue-quality">900</span> </br>
                        <span class="si si-graph"  style="color: red"></span>
                        <span class="card-sales">Sales</span>
                    </div>
                </div>
                <div class = "col-2 card-revenue">
                    <div class="card-header">
                        <span class="card-revenue-title">Năm ngoái</span>
                    </div>
                    <div class = "card-body">
                        <span class="card-revenue-quality">900</span> </br>
                        <span class="si si-graph"  style="color: red"></span>
                        <span class="card-sales">Sales</span>
                    </div>
                </div>
            </div>
        </div>
    <!-- End card revenue -->

    <!-- chart-->
    <div class = "charts-area row">
        <div class="revenue-chart-area col-6">
            <canvas id="revenueChart" ></canvas>
        </div>
        
        <div class="rating-chart-area col-4">
            <div id="rating-title">
                <span class="title-label"> Đánh giá của khách hàng</span>
            </div>
            <div style="display: flex; justify-content:center; padding:3%">
                <canvas id="ratingChart" ></canvas>
            </div>
           
        </div>
        
    </div>
        
    <!--End chart-->
    </div>
    <?php include 'footer.php'?>
</body>
</html>
<script src="../../assests/admin/js/home.js?v=5"></script>
<script src="../../assests/admin/js/chart/chart.js?v=1"></script>
