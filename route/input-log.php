<?php
session_start();
require '../controllers/connect.php';
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(!empty($username) && !empty($password)){
        $sql = "SELECT * FROM customer WHERE Customer_Username = '$username' AND Customer_Password = '$password'";
        $sql1 = "SELECT * FROM `admin` WHERE Username = '$username' AND Password = '$password'";
        $result = $conn->query($sql);
        $result1 = $conn->query($sql1);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $status = $row['Customer_Status'];       
            if ($status == 1) {
                $_SESSION["user"] = $username;
                echo "<script>window.location.href = '../views/user/index.php';</script>";
            } else if ($status == 0) {
                echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu')</script>";
                echo "<script>window.location.href = '../views/user/login.php';</script>";
            }
        } else{
            if ($result1->num_rows == 1) {
                $row = $result1->fetch_assoc();
                $status = $row['Admin_Status'];
           
                if ($status == 1) {
                    $_SESSION["user"] = $username;
                    echo "<script>window.location.href = '../views/admin/home.php';</script>";
                    //header("location:http://localhost/Jewelry_web_9/views/admin/home.php");
                    //exit();
                } else if ($status == 0) {
                    echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu')</script>";
                    echo "<script>window.location.href = '../views/user/login.php';</script>";
                    //header("location:http://localhost/Jewelry_web_9/views/user/index.php");
                    //exit();
                }
            } else{
                echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu')</script>";
                echo "<script>window.location.href = '../views/user/login.php';</script>";
            }
        }

    }else{
        echo "<script>alert('Mời bạn điền đầy đủ thông tin')</script>";	
        echo "<script>window.location.href = '../views/user/login.php';</script>";
    }
}
?>