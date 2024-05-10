<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="Serena Jewelry" href="../../assests/user/css/payment.css?v=4" >
</head>
<body>
    <?php include 'header.php' ?>

    <div class = "content">
        <div class = "address-area ">
            <div style="display: flex;">
                <span class="si si-location-pin location-icon"></span>
                <p id="txt-address">Địa chỉ nhận hàng</p>
            </div>
            <div class= "row">
                <div class ="col-3" id="customer-name"> Thùy Duyên</div>
                <div class = "col-3" id="customer-phone">0356988637</div>
                <div class = "col-5" id="customer-address"> 154/8 Nguyễn Xí, Phường 21, Quận Bình Thạnh, Thành phố Hồ Chí Minh </div>
                <button class = " col-1"> Thay đổi</button>
            </div>
        </div>

        <div class="product-area">
            <div class ="row">
                <div class="col-6 th-name" > Sản phẩm</div>
                <div class="col-2 th-name"> Đơn giá</div>
                <div class="col-2 th-name"> Số lượng</div>
                <div class="col-2 th-name"> Thành tiền</div>
            </div>
            <div class="row order-item">
                <div class="col-6" style="display: flex;">
                    <div class="col-2">
                        <img  class="order-picture" src ="https://bizweb.dktcdn.net/thumb/1024x1024/100/318/889/products/sd54114-min.jpg?v=1680513659750"> 
                    </div>
                    <div class="col-4 item-name" > Dây chuyền ngọc trai</div>
                </div>
                <div class = "col-2 item-price"> 2500000</div>
                <div class = "col-2 item-quantity">1</div>
                <div class = "col-2 item-total-price">2500000</div>
            </div>
            <div class="row order-item">
                <div class="col-6" style="display: flex;">
                    <div class="col-2">
                        <img  class="order-picture" src ="https://bizweb.dktcdn.net/thumb/1024x1024/100/318/889/products/sd54114-min.jpg?v=1680513659750"> 
                    </div>
                    <div class="col-4 item-name" > Dây chuyền ngọc trai</div>
                </div>
                <div class = "col-2 item-price"> 2500000</div>
                <div class = "col-2 item-quantity">1</div>
                <div class = "col-2 item-total-price">2500000</div>
            </div>
        </div>

        <div class="infor-items">
            <div class="row">
                <div class="col-5">
                    <label>Lời nhắn</label>
                    <input placeholder="Lưu ý cho cửa hàng" class="note-shop"/>
                </div>
                <div class="col-7">
                    <span>Đơn vị vận chuyển: JSP</span>
                    <span>56.000</span>
                </div>
            </div>
            <div class="row">
                <div id="total-area-price">Tổng giá tiền
                    <span> (2 sản phẩm): </span>
                    <span>5000000</span>    
                </div>

            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>
