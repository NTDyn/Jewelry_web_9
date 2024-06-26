<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../../assests\user/css/login.css">
</head>
<body>
    <div class="khung">
        <div class="main"> 
            <div class="head">
                <button id="login-btn"><a href="login.php"><b>Đăng nhập</b></a></button>
                <button id="register-btn"><a href="register.php"><b>Đăng ký</b></a></button>
            </div>
            
            <form id="login-form" class="login-form active-form" action="../../route/input-log.php" method="post">
                <div class="form-group">
                    <input type="text" name="username" placeholder="Tài khoản">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Mật khẩu">
                </div>
                <div class="forgotpassword">
                    <p><a href="forgot.php">Quên mật khẩu</a></p>
                </div>
                <div class="form-submit">
                    <input type="submit" name="login" value="ĐĂNG NHẬP">
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
