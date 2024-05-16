<?php   
    session_start();
    require '../controllers/connect.php';
    $username = $_SESSION["user"];

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

    if(isset($_POST['changpassword'])){
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        $checkpassword = $_POST['checkpassword'];       
        $sql = "SELECT * FROM customer WHERE Customer_Username = '$username' AND Customer_Password = '$oldpassword'";
        $result = $conn->query($sql);
            if ($result->num_rows == 0){
            echo "<script>alert('Password bạn nhập không chính xác')</script>";   
            }else{
                if($newpassword != $oldpassword){
                    if($newpassword == $checkpassword){
                        $sql1 = "UPDATE customer SET Customer_Password = '$newpassword' WHERE Customer_Username = '$username' ";
                        if($conn->query($sql1) == true){
                                echo "<script>alert('Mật khẩu đã đổi thành công')</script>";
                                echo "<script>window.location.href = '../views/user/infor_personal.php';</script>";
                        }
                    }else{
                        echo "<script>alert('Mật khẩu bạn nhập không trùng khớp')</script>"; 
                        echo "<script>window.location.href = '../views/user/infor_personal.php';</script>";
                    }   
                }else{
                    echo "<script>alert('Mật khẩu mới trùng với mật khẩu cũ')</script>"; 
                    echo "<script>window.location.href = '../views/user/infor_personal.php';</script>";
                }   
            }
    }

    if(isset($_POST['changinfor'])){
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];       
        $email = $_POST['email'];  
/*        
        if(!empty($fullname) && !empty($phone) && !empty($address) && !empty($email)){
            if (isValidPhoneNumber($phone)) {           
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {                        
                    $sql2 = "UPDATE customer SET Customer_Name = '$fullname', Customer_Phone = '$phone',
                                Customer_Address = '$address', Customer_Email = '$email' WHERE Customer_Username = '$username' ";    
                    if($conn->query($sql2) == true){
                            echo "<script>alert('Bạn đã cập nhập thông tin cá nhân thành công')</script>";
                            echo "<script>window.location.href = '../views/user/infor_personal.php';</script>";
                    }else{
                        echo "<script>alert('Lỗi không thể cập nhập')</script>"; 
                        echo "<script>window.location.href = '../views/user/infor_personal.php';</script>";
                    }                                                        
                }else{
                    echo "<script>alert('Email không hợp lệ')</script>";
                    echo "<script>window.location.href = '../views/user/infor_personal.php';</script>";
                }
            }else{
                echo "<script>alert('Số điện thoại không hợp lệ')</script>";
                echo "<script>window.location.href = '../views/user/infor_personal.php';</script>";
            }         
                        
        }else{
            echo "<script>alert('Mời bạn nhập đầy đủ thông tin trước khi cập nhập')</script>";  
            echo "<script>window.location.href = '../views/user/infor_personal.php';</script>"; 
        }
*/
        if(!empty($fullname)){
            $sql2 = "UPDATE customer SET Customer_Name = '$fullname' WHERE Customer_Username = '$username' ";    
            if($conn->query($sql2) == true){
                    echo "<script>alert('Bạn đã cập nhập thông tin cá nhân thành công')</script>";
                    echo "<script>window.location.href = '../views/user/infor_personal.php';</script>";
            }else{
                echo "<script>alert('Lỗi không thể cập nhập')</script>"; 
                echo "<script>window.location.href = '../views/user/infor_personal.php';</script>";
            }
        }

        if(!empty($phone)){
            if (isValidPhoneNumber($phone)) {   
                $sql3 = "UPDATE customer SET Customer_Phone = '$phone' WHERE Customer_Username = '$username' ";    
                if($conn->query($sql3) == true){
                        echo "<script>alert('Bạn đã cập nhập thông tin cá nhân thành công')</script>";
                        echo "<script>window.location.href = '../views/user/infor_personal.php';</script>";
                }else{
                    echo "<script>alert('Lỗi không thể cập nhập')</script>"; 
                    echo "<script>window.location.href = '../views/user/infor_personal.php';</script>";
                }
            }else{
                echo "<script>alert('Số điện thoại không hợp lệ')</script>";
                echo "<script>window.location.href = '../views/user/infor_personal.php';</script>";
            }
        }

        if(!empty($address)){
            $sql4 = "UPDATE customer SET Customer_Address = '$address' WHERE Customer_Username = '$username' ";    
            if($conn->query($sql4) == true){
                    echo "<script>alert('Bạn đã cập nhập thông tin cá nhân thành công')</script>";
                    echo "<script>window.location.href = '../views/user/infor_personal.php';</script>";
            }else{
                echo "<script>alert('Lỗi không thể cập nhập')</script>"; 
                echo "<script>window.location.href = '../views/user/infor_personal.php';</script>";
            }
        }

        if(!empty($email)){
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $sql5 = "UPDATE customer SET Customer_Email = '$email' WHERE Customer_Username = '$username' ";    
                if($conn->query($sql5) == true){
                        echo "<script>alert('Bạn đã cập nhập thông tin cá nhân thành công')</script>";
                        echo "<script>window.location.href = '../views/user/infor_personal.php';</script>";
                }else{
                    echo "<script>alert('Lỗi không thể cập nhập')</script>"; 
                    echo "<script>window.location.href = '../views/user/infor_personal.php';</script>";
                }
            }else{
                echo "<script>alert('Email không hợp lệ')</script>";
                echo "<script>window.location.href = '../views/user/infor_personal.php';</script>";
            }
        }
    }    
?>