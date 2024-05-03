<?php 
    include '../controllers/receipt_C.php';

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
        if($_POST['action'] == 'getProduct'){
            $contr = new receipt_C();
            $id = (int) $_POST['product-id'];
            $result = $contr->getProduct($id);
            echo  json_decode($result);
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
?>