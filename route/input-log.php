<?php
require '../controllers/connect.php';
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(!empty($username) && !empty($password)){
        $sql = "SELECT * FROM customer WHERE Customer_Username = '$username' AND Customer_Password = '$password'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $status = $row['Customer_Status'];
        
            if ($status == 1) {
                header("location:http://localhost/Jewelry_web_9/views/admin/home.php");
                exit();
            } elseif ($status == 0) {
                header("location:http://localhost/Jewelry_web_9/views/user/index.php");
                exit();
            }
        } else {
            echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu')</script>";	
        }  
    }else{
        echo "<script>alert('Mời bạn điền đầy đủ thông tin')</script>";	
    }
}
?>