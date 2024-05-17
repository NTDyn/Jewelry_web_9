<?php
session_start();
//session_unset();
//unset($_SESSION["user"]);
require '../controllers/connect.php';
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(!empty($username) && !empty($password)){
        $sql1 = "SELECT * FROM `admin` WHERE Username = '$username' AND Password = '$password'";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows == 1) {
            $row = $result1->fetch_assoc();
            $status = $row['Admin_Status']; 
            $admin_id = $row['Admin_ID'];      
            if ($status == 1) {
                $_SESSION["admin"] = $username;
                $_SESSION["Admin_ID"] = $admin_id;
                echo "<script>window.location.href = '../views/admin/home.php';</script>";
            } else if ($status == 0) {
                
                echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu')</script>";
                echo "<script>window.location.href = '../views/admin/login.php';</script>";
            }
        }else{             
            echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu')</script>";
            echo "<script>window.location.href = '../views/admin/login.php';</script>";
        }
    }else{
        echo "<script>alert('Mời bạn điền đầy đủ thông tin')</script>";	
        echo "<script>window.location.href = '../views/admin/login.php';</script>";
    }
}
?>