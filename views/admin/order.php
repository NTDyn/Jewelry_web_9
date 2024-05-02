<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assests/admin/css/order.css">
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
                    <th>Tên khách hàng</th>
                    <th>Tổng tiền</th>
                    <th>Ngày đặt</th>
                    <th>Trạng thái</th>
                    <th>Tính năng</th>
                </thead>
            </table>
        </div>
    </div>
    <?php  include 'footer.php' ?>
</body>
</html>
<script><?php require ("../../assests/admin/js/order.js") ?></script>