<?php
session_start();
require '../controllers/connect.php';
if(isset($_POST['register_admin'])){   
    $adminname = $_POST['adminname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $com_password = $_POST['confirm_password'];

    if(!empty($adminname)
        &&!empty($username)
        &&!empty($password)
        &&!empty($com_password)){
            //Xuất thông tin theo chiều dọc
            //echo "<pre>";
            //Xuất thông tin tại cái ô input
            //print_r($_POST);
         
        $sql1 = "SELECT * FROM admin WHERE Username = '$username'";
        $result = $conn->query($sql1);
        if ($result->num_rows == 0) {
            if($password != $com_password){
                echo "<script>alert('Mật khẩu nhập lại không trùng khớp')</script>";	
                echo "<script>window.location.href = '../views/user/register.php';</script>";	
            }else{
                $sql = "INSERT INTO `admin` (`Admin_Name`,`Username`,`Password`, `Admin_Status`)
                        VALUES('$adminname','$username', '$password', 1)";// mã hóa md5('$password')
                
                if($conn->query($sql) === TRUE){
                    $content = "Đăng ký thành công";
                    echo "<script>alert('Đăng ký thành công')</script>";
                    echo "<script>window.location.href = '../views/admin/home.php';</script>";
                }else{
                    echo "Lỗi {$sql}".$conn->error;
                }
            }    
        } else {
            echo "<script>alert('Username đã tồn tại')</script>";	
            echo "<script>window.location.href = '../views/admin/register.php';</script>";
        }                                    
    }else{
        echo "<script>alert('Mời bạn nhập đầy đủ thông tin')</script>";
        echo "<script>window.location.href = '../views/admin/register.php';</script>";
    }

}
?>