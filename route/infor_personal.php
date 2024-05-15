<?php   
    //session_start();
    require '../controllers/connect.php';
    $username = $_SESSION["user"];
    if(isset($_POST['changpassword'])){
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        $checkpassword = $_POST['checkpassword'];       
        $sql = "SELECT * FROM customer WHERE Customer_Username = '$username' AND Customer_Password = '$oldpassword'";
        $result = $conn->query($sql);
            if ($result->num_rows == 0){
            echo "<script>alert('Password bạn nhập không chính xác')</script>";   
            }else{
                if($newpassword == $checkpassword){
                    $sql = "UPDATE customer SET Customer_Password = '$newpassword' WHERE Customer_Username = '$username' ";
                    if($conn->query($sql) == true){
                            echo "<script>alert('Mật khẩu đã đổi thành công')</script>";
                            echo "<script>window.location.href = '../views/user/infor_personal.php';</script>";
                    }
                }else{
                    echo "<script>alert('Mật khẩu bạn nhập không trùng khớp')</script>"; 
                }      
            }
    }
/*
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
*/
?>