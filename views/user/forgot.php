<?php
    require '../../controllers/connect.php';
    if(isset($_POST['sentpass'])){
        $email = $_POST['email'];
        $username = $_POST['username'];
        $sql = "SELECT * FROM customer WHERE Customer_Username = '$username' AND Customer_Email = '$email'";
        $result = $conn->query($sql);
            if ($result->num_rows == 0){
            echo "<script>alert('Username hoặc Email bạn nhập không phải thành viên của chúng tôi')</script>";   
        }else{
            $newpassword = substr(md5(rand(0,999999)), 0, 8);
            $sql = "UPDATE customer SET Customer_Password = '$newpassword' WHERE Customer_Username = '$username' AND Customer_Email = '$email' ";
            if($conn->query($sql) == true){
                $kq = Sentnewpassword($newpassword, $email);
                if($kq == true){
                    echo "<script>alert('Mật khẩu đã gửi tới Email thành công')</script>";
                    echo "<script>window.location.href = 'login.php';</script>";
                }
            }else{
                echo "Lỗi không kết nối";
            }          
        }
    }

    
    
    function Sentnewpassword($newpassword, $email) {
        require "../../PHPMailer-master/src/PHPMailer.php"; 
        require "../../PHPMailer-master/src/SMTP.php"; 
        require '../../PHPMailer-master/src/Exception.php'; 
    
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    
        try {
            $mail->SMTPDebug = 2; // 0,1,2: chế độ debug
            $mail->isSMTP();  
            $mail->CharSet = "utf-8";
            $mail->Host = 'smtp.gmail.com';  // SMTP servers
            $mail->SMTPAuth = true; // Enable authentication
            $mail->Username = 'anhhao201511@gmail.com'; // SMTP username
            $mail->Password = 'aqbxbzczysucykld';   // SMTP password
            $mail->SMTPSecure = 'tls';  // encryption TLS/SSL
            $mail->Port = 465;  // port to connect to
    
            $mail->setFrom('anhhao201511@gmail.com', 'Shop Jewelry'); 
            $mail->addAddress($email); 
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = 'New Password';
    
            $noidungthu = "<p>Bạn nhận được tin này do bạn hay ai đó đã gửi yêu cầu</p>
                           <p>Mật khẩu mới của bạn là: {$newpassword}</p>"; 
            $mail->Body = $noidungthu;
    
            $mail->smtpConnect(array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            ));
    
            $mail->send();
            return true;
        } catch (Exception $e) {
            echo 'Error: ', $mail->ErrorInfo;
            return false;
        }
    }
    
/*
    function Sentnewpassword($newpassword, $email){
        require "../../PHPMailer-master/src/PHPMailer.php"; 
        require "../../PHPMailer-master/src/SMTP.php"; 
        require '../../PHPMailer-master/src/Exception.php'; 
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
        try {
            $mail->SMTPDebug = 0; //0,1,2: chế độ debug
            $mail->isSMTP();  
            $mail->CharSet  = "utf-8";
            $mail->Host = 'smtp.gmail.com';  //SMTP servers
            $mail->SMTPAuth = true; // Enable authentication
            $mail->Username = 'anhzero816@gmail.com'; // SMTP username
            $mail->Password = 'Trunganh123';   // SMTP password
            $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
            $mail->Port = 465;  // port to connect to                
            $mail->setFrom('anhzero816@gmail.com', 'Shop Jewelry' ); 
            $mail->addAddress($email); 
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = 'New Password';
            $noidungthu = " <p>Bạn nhận được tin này do bạn hay ai đó đã gửi yêu cầu</p>
                Mật khẩu mới của bạn là: {$newpassword} 
            "; 
            $mail->Body = $noidungthu;
            $mail->smtpConnect( array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            ));
            $mail->send();
            return true;
        } catch (Exception $e) {
            echo 'Error: ', $mail->ErrorInfo;
            return false;
        }    
    }
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href="../../assests\user/css/forgot.css">
</head>
<body>
    <div class="khung">
        <div class="main">
            <div class="head">
                <p><b>Quên mật khẩu</b></p>
            </div>
            
            <form id="login-form" class="login-form active-form" action="" method="post">
                <div class="form-group">
                    <input type="text" name="username" placeholder="Nhập Username">
                </div>
                <div class="form-group">
                    <input type="text" name="email" placeholder="Nhập Email">
                </div>
                <div class="form-submit">
                    <input type="submit" name="sentpass" value="Nhận mã về Email">
                </div>
                <div class="back_login">
                    <a href="login.php">Quay về trang login</a>
                </div>               
            </form>

        </div>   
    </div>

</body>
</html>
