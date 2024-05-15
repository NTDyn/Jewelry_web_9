<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="../../assests\user/css/register.css">
</head>
<body>
    <div class="khung">
        <div class="main">
            <div class="head">
                <button id="login-btn"><a href="login.php"><b>Đăng nhập</b></a></button>
                <button id="register-btn"><a href="register.php"><b>Đăng ký</b></a></button>
            </div>

            <form id="register-form" class="register-form" action="../../route/input-reg.php" method="post">
                <div class="form-group">
                    <input type="text" name="fullname" placeholder="Họ và tên">
                </div>
                <div class="form-group">
                    <input type="text" name="phone" placeholder="Số điện thoại">
                </div>
                <div class="form-group">
                    <input type="text" name="address" placeholder="Địa chỉ">
                </div>
                <div class="form-group">
                    <input type="text" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="text" name="username" placeholder="Tài khoản">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Mật khẩu">
                </div>
                <div class="form-group">
                    <input type="password" name="confirm_password" placeholder="Nhập lại mật khẩu">
                </div>
                <div class="form-submit">
                    <input type="submit" name="register" value="XÁC NHẬN">
                </div>
            </form>
        </div>
        <form action="index.php">
            <div class="back_index">
                <input type="submit" value="Quay lại"> 
            </div>
        </form>   
    </div>
    
</body>
</html>
