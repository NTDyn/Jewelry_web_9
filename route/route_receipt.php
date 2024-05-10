<?php 
    include '../controllers/receipt_C.php';
   // include '../controllers/product_C.php';

    if(isset($_POST['action'])){
        if($_POST['action'] == 'read'){
            $contr = new receipt_C();
            $result = $contr->getListReceipt();
            echo $result;
        }
    }

    if(isset($_POST['action'])){
        if($_POST['action'] == 'getCustomer'){
            $contr = new receipt_C();
            $id = (int) $_POST['customer-id'];
            $result = $contr->getCustomer($id);
            echo $result;
        }
    }

    if(isset($_POST['action'])){
        if($_POST['action'] == 'getDetailOfReceipt'){
            $contr = new receipt_C();
            $id = (int) $_POST['receipt-id'];
            $result = $contr->getDetailOfReceipt($id);
            echo $result;
        }
    }

    if(isset($_POST['action'])){
        if($_POST['action'] == 'confirm'){
            $contr = new receipt_C();
            $id = (int) $_POST['receipt-id'];
            $result = $contr->confirmOrder($id);
            echo  ($result);
        }
    }

    if(isset($_POST['action'])){
        if($_POST['action'] == 'delivered'){
            $contr = new receipt_C();
            $id = (int) $_POST['receipt-id'];
            $result = $contr->deliveredOrder($id);
            echo  ($result);
        }
    }

    if(isset($_POST['action'])){
        if($_POST['action'] == 'received'){
            $contr = new receipt_C();
            $id = (int) $_POST['receipt-id'];
            $result = $contr->receivedOrder($id);
            echo  ($result);
        }
    }

    if(isset($_POST['action'])){
        if($_POST['action'] == 'cancel'){
            $contr = new receipt_C();
            $id = (int) $_POST['receipt-id'];
            $result = $contr->cancelOrder($id);
            echo  ($result);
        }
    }

    if(isset($_POST['action'])){
        if($_POST['action'] == 'existCustomer'){
            $customer = new customer_E();
            $customer->Customer_Phone =  $_POST['customer-phone'];
             
            $contr =  new receipt_C();
            $result = $contr->existCustomer($customer);
            echo $result;
        }
    }


    if(isset($_POST['action'])){
        if($_POST['action'] == 'checkCustomerInfor'){
            $customer = new customer_E();
            $customer->Customer_Name = $_POST['customer-name'];
            $customer->Customer_Address = $_POST['customer-address'];
            $customer->Customer_Email = $_POST['customer-email'];
            $customer->Customer_Phone =  $_POST['customer-phone'];
             
            $contr =  new receipt_C();
            $result = $contr->checkCustomerInfor($customer);
            echo json_encode($result);
        }
    }

    if(isset($_POST['action'])){
        if($_POST['action'] == 'getListProduct'){
            $contr = new receipt_C();
            $result = $contr->getListProduct();
            echo  ($result);
        }
    }
?>