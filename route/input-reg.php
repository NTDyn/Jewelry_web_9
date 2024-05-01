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
        if($password != $com_password){
            //header("location:http://localhost/Jewelry_web_9/views/user/register.php");
            echo "<script>alert('Mật khẩu nhập lại không trùng khớp')</script>";		
        }else{
            $sql = "INSERT INTO `customer` (`Customer_Name`, `Customer_Phone`, `Customer_Address`, `Customer_Email`, `Customer_Username`,`Customer_Password`, `Customer_Status`)
                    VALUES('$fullname', '$phone', '$address', '$email', '$username', md5('$password'), 0)";
            
            if($conn->query($sql) === TRUE){
                $content = "Đăng ký thành công";
                echo "<script>alert('Đăng ký thành công')</script>";
                //function notification($content){
                //    echo "<script>alert('$content');</script>";
                //}
                //$this->notification();
                //header("location:http://localhost/Jewelry_web_9/views/user/login.php");
				//setcookie("success", "Đăng ký thành công!", time()+1, "/","", 0);
                
                //echo "<script>window.location.href = '../view/user/login.php';</script>";
            }else{
                echo "Lỗi {$sql}".$conn->error;
            }
        }
    }else{
        echo "<script>alert('Mời bạn nhập đầy đủ thông tin')</script>";
        //header("location:http://localhost/Jewelry_web_9/views/user/register.php");
        //setcookie("error", "Mời bạn nhập đầy đủ thông tin!", time()+1, "/","", 0);	
        //if(isset($_COOKIE["error"])){
            //echo "<script> alert('$_COOKIE['error']')</script>"; 
        //}
        //echo "<script>window.location.href = '../view/user/register.php';</script>";
    }

}

?>