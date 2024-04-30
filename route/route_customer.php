<?php 
    include '../controllers/customer_C.php';

        if(isset($_POST['action'])){
            if($_POST['action'] == 'read'){
                $contr =  new customer_C();
                $result = $contr->getListCustomer();
                echo $result;
            }
        }

        if(isset($_POST['action'])){
            if($_POST['action'] == 'remove'){
                $id = (int) $_POST['id_remove'];
                $contr =  new customer_C();
                $result = $contr->removeCustomer($id);
                echo $result;
            }
        }

        if(isset($_POST['action'])){
            if($_POST['action'] == 'restart'){
                $id = (int) $_POST['id_restart'];
                $contr =  new customer_C();
                $result = $contr->restartCustomer($id);
                echo $result;
            }
        }

        if(isset($_POST['action'])){
            if($_POST['action'] == 'add'){
                $customer = new customer_E();
                $customer->Customer_Name = $_POST['customer-name'];
                $customer->Customer_Address = $_POST['customer-address'];
                $customer->Customer_Email = $_POST['customer-email'];
                $customer->Customer_Username = $_POST['customer-username'];
                $customer->Customer_Phone =  $_POST['customer-phone'];
                $customer->Customer_Password = $_POST['customer-password'];
                $customer->Customer_Status = 0;
                if(isset($_POST['btnActive'])){
                    $customer->Customer_Status = 1;
                    
                } 
                
                 
                $contr =  new customer_C();
                $result = $contr->addCustomer($customer);
                echo json_encode($result);
            }
        }

        if(isset($_POST['action'])){
            if($_POST['action'] == 'getCustomer'){
                $id = (int) $_POST['id_edit'];
                $contr = new customer_C();
                $result = $contr->getCustomer($id);
                echo $result;
            }
        }

        if(isset($_POST['action'])){
            if($_POST['action'] == 'edit'){

                    $customer = new customer_E();
                    $customer->Customer_ID = (int) $_POST['id_edit'];
                    $customer->Customer_Name = $_POST['customer-edit-name'];
                    $customer->Customer_Address = $_POST['customer-edit-address'];
                    $customer->Customer_Email = $_POST['customer-edit-email'];
                    $customer->Customer_Username = $_POST['customer-edit-username'];
                    $customer->Customer_Phone =  $_POST['customer-edit-phone'];
                    $contr =  new customer_C();
                    $result =  $contr->editCustomer($customer);
                    echo json_encode($result);

            }
        }
?>