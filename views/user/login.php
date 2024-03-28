<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập và Đăng ký</title>
    <link rel="stylesheet" href="../../assests\user/css/login.css">
</head>
<body>
    <div class="main">
        <div class="head">
            <button id="login-btn">Đăng nhập</button>
            <button id="register-btn">Đăng ký</button>
        </div>
        
        <form id="login-form" class="login-form active-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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

        <form id="register-form" class="register-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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

    <script>
        document.getElementById('login-btn').addEventListener('click', function() {
            document.getElementById('login-form').classList.add('active-form');
            document.getElementById('register-form').classList.remove('active-form');
        });

        document.getElementById('register-btn').addEventListener('click', function() {
            document.getElementById('register-form').classList.add('active-form');
            document.getElementById('login-form').classList.remove('active-form');
        });
    </script>
</body>
</html>

    </div>
</body>
</html>