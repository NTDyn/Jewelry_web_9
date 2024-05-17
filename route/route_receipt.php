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

    if(isset($_POST['action'])){
        if($_POST['action'] == 'addReceipt'){
            $receipt = new Receipt_E() ;
            $receipt->Customer_ID = $_POST['Customer_ID'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $receipt->Receipt_Date = date('Y-m-d H:i:s');
            $receipt->Receipt_Total = $_POST['Receipt_Total'];
            $receipt->Receipt_Status = 2;
            $receipt->Receipt_Note = $_POST['Receipt_Note'];
            $receipt->Receipt_Payment = $_POST['Receipt_Payment'];
            $receipt->Admin_ID = $_POST['Admin_ID'];
            $customer = new customer_E();
            $customer->Customer_ID = $_POST['Customer_ID'];
            $customer->Customer_Name = $_POST['Customer_Name'];
            $customer->Customer_Phone = $_POST['Customer_Phone'];
            $customer->Customer_Email = $_POST['Customer_Email'];
            $customer->Customer_Username = $_POST['Customer_Username'];
            $customer->Customer_Password = $_POST['Customer_Password'];
            $customer->Customer_Address = $_POST['Customer_Address'];
            $customer->Customer_Status = 1;
            $contr = new receipt_C();
            $result = $contr->addReceipt($receipt, $customer);
            echo  ($result);
        }
    }

    if(isset($_POST['action'])){
        if($_POST['action'] == 'addDetail'){
            $listProduct = $_POST['listSelectedProduct'];
            $contr = new receipt_C();
            $result = $contr->addReceiptDetail($listProduct);
            echo  ($result);
        }
    }

    if(isset($_POST['action'])){
        if($_POST['action'] == 'getAllHistoryOrder'){
            $id = $_POST['Customer_ID'];
            $contr = new receipt_C();
            $result = $contr->getAllHistoryOrder($id);
            echo  ($result);
        }
    }

    if(isset($_POST['action'])){
        if($_POST['action'] == 'addCustomer'){
            $customer = new customer_E();
            $customer->Customer_Name = $_POST['customer-name'];
            $customer->Customer_Address = $_POST['customer-address'];
            $customer->Customer_Email = $_POST['customer-email'];
            $customer->Customer_Username = $_POST['customer-username'];
            $customer->Customer_Phone =  $_POST['customer-phone'];
            $customer->Customer_Password = $_POST['customer-password'];
            $customer->Customer_Status = 1;
             
            $contr =  new receipt_C();
            $result = $contr->addCustomer($customer);
            echo json_encode($result);
        }
    }

    
?>