<?php
session_start();
require '../controllers/connect.php';
if(isset($_POST['register'])){   
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $com_password = $_POST['confirm_password'];

    function isValidPhoneNumber($phoneNumber) {
        // Loại bỏ tất cả các ký tự không phải là số từ chuỗi
        $phoneNumber = preg_replace('/\D/', '', $phoneNumber);
    
        // Kiểm tra xem chuỗi có độ dài hợp lệ không
        if (strlen($phoneNumber) == 10 || (strlen($phoneNumber) == 11 && $phoneNumber[0] == '0')) {
            return true;
        } else {
            return false;
        }
    }

    if(!empty($fullname)
        &&!empty($phone)
        &&!empty($address)
        &&!empty($email)
        &&!empty($username)
        &&!empty($password)
        &&!empty($com_password)){
            //Xuất thông tin theo chiều dọc
            //echo "<pre>";
            //Xuất thông tin tại cái ô input
            //print_r($_POST);
        if (isValidPhoneNumber($phone)) {           
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {    
                $sql1 = "SELECT * FROM customer WHERE Customer_Username = '$username'";
                $result = $conn->query($sql1);
                if ($result->num_rows == 0) {
                    if($password != $com_password){
                        echo "<script>alert('Mật khẩu nhập lại không trùng khớp')</script>";	
                        echo "<script>window.location.href = '../views/user/register.php';</script>";	
                    }else{
                        $sql = "INSERT INTO `customer` (`Customer_Name`, `Customer_Phone`, `Customer_Address`, `Customer_Email`, `Customer_Username`,`Customer_Password`, `Customer_Status`)
                                VALUES('$fullname', '$phone', '$address', '$email', '$username', '$password', 1)";// mã hóa md5('$password')
                        
                        if($conn->query($sql) === TRUE){
                            $content = "Đăng ký thành công";
                            echo "<script>alert('Đăng ký thành công')</script>";
                            echo "<script>window.location.href = '../views/user/login.php';</script>";
                        }else{
                            echo "Lỗi {$sql}".$conn->error;
                        }
                    }    
                } else {
                    echo "<script>alert('Username đã tồn tại')</script>";	
                    echo "<script>window.location.href = '../views/user/register.php';</script>";
                }                             
            }else{
                echo "<script>alert('Email không hợp lệ')</script>";
                echo "<script>window.location.href = '../views/user/register.php';</script>";
            }
        }else{
            echo "<script>alert('Số điện thoại không hợp lệ')</script>";
            echo "<script>window.location.href = '../views/user/register.php';</script>";
        }
        
    }else{
        echo "<script>alert('Mời bạn nhập đầy đủ thông tin')</script>";
        echo "<script>window.location.href = '../views/user/register.php';</script>";
    }

}

?>