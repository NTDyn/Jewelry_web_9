<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký admin</title>
    <link rel="stylesheet" href="../../assests\admin/css/register.css">
</head>
<body>
    <div class="khung">
        <div class="main">
            <div class="head">
                <p><b>Đăng ký Admin</b></p>
            </div>

            <form id="register-form" class="register-form" action="../../route/input-reg_admin.php" method="post">
                <div class="form-group">
                    <input type="text" name="adminname" placeholder="Họ và tên">
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
                    <input type="submit" name="register_admin" value="XÁC NHẬN">
                </div>
            </form>
        </div>
        <form action="home.php">
            <div class="back_index">
                <input type="submit" value="Quay lại"> 
            </div>
        </form>   
    </div>
    
</body>
</html>
