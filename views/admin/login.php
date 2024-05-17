<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../../assests\admin/css/login.css">
</head>
<body>
    <div class="khung">
        <div class="main"> 
            <div class="head">
                <p><b>Đăng nhập Admin</b></p>
            </div>
            
            <form id="login-form" class="login-form active-form" action="../../route/input-log_admin.php" method="post">
                <div class="form-group">
                    <input type="text" name="username" placeholder="Tài khoản">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Mật khẩu">
                </div>
                <div class="form-submit">
                    <input type="submit" name="login" value="ĐĂNG NHẬP">
                </div>
            </form>

        </div>
<!--
        <form action="../user/index.php">
            <div class="back_index">
                <input type="submit" value="Quay lại"> 
            </div>
        </form>     
-->
    </div>
    
</body>
</html>
