<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin cá nhân</title>
    <link rel="stylesheet" href="../../assests\user/css/infor_personal.css">
</head>
<body>
    <?php
        include 'header.php';
        //require '../controllers/connect.php';
        $username = $_SESSION["user"];
        $sql1 = "SELECT Customer_Name FROM customer WHERE Customer_Username = '$username'";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            $data = $result1->fetch_assoc();
            $fullname = $data['Customer_Name'];
        } else {
            $fullname = ""; 
        }
        
        $sql2 = "SELECT Customer_Phone FROM customer WHERE Customer_Username = '$username'";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            $data = $result2->fetch_assoc();
            $phone = $data['Customer_Phone'];
        } else {
            $phone = ""; 
        }

        $sql3 = "SELECT Customer_Address FROM customer WHERE Customer_Username = '$username'";
        $result3 = $conn->query($sql3);
        if ($result3->num_rows > 0) {
            $data = $result3->fetch_assoc();
            $address = $data['Customer_Address'];
        } else {
            $address = ""; 
        }

        $sql4 = "SELECT Customer_Email FROM customer WHERE Customer_Username = '$username'";
        $result4 = $conn->query($sql4);
        if ($result4->num_rows > 0) {
            $data = $result4->fetch_assoc();
            $email = $data['Customer_Email'];
        } else {
            $email = ""; 
        }
    ?>
    <div class="khung">

        <div class="khung1">
            <div class="main"> 

                <div class="head">
                    <p>Thông tin cá nhân</p>
                </div>

                <form id="chang_password-form" class="login-form active-form" action="../../route/infor_personal.php" method="post">
                    <div class="form-group">
                        <p>Họ và tên: </p>
                        <input type="text" name="fullname" placeholder="<?php echo $fullname; ?>">
                    </div>
                    <div class="form-group">
                        <p>Số điện thoại: </p>
                        <input type="text" name="phone" placeholder="<?php echo $phone; ?>">
                    </div>
                    <div class="form-group">
                        <p>Địa chỉ: </p>
                        <input type="text" name="address" placeholder="<?php echo $address; ?>">
                    </div>
                    <div class="form-group">
                        <p>Email: </p>
                        <input type="text" name="email" placeholder="<?php echo $email; ?>">
                    </div>
                    <div class="form-submit">
                        <input type="submit" name="changinfor" value="Cập nhập thông tin cá nhân">
                    </div>
                </form>
                
            </div>            
        </div>

        <div class="khung1">
            <div class="main"> 
                <div class="head">
                    <p>Đổi mật khẩu</p>
                </div>
                
                <form id="infor_personal-form" class="login-form active-form" action="../../route/infor_personal.php" method="post">
                    <div class="form-group">
                        <input type="password" name="oldpassword" placeholder="Mật khẩu hiện tại">
                    </div>
                    <div class="form-group">
                        <input type="password" name="newpassword" placeholder="Mật khẩu mới">
                    </div>
                    <div class="form-group">
                        <input type="password" name="checkpassword" placeholder="Nhập lại mật khẩu mới">
                    </div>
                    <div class="form-submit">
                        <input type="submit" name="changpassword" value="Thay đổi mật khẩu">
                    </div>
                </form>
                    
            </div>
        </div>
    </div>
    
    
</body>
</html>
