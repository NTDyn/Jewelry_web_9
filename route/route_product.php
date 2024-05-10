<?php 
 include '../controllers/product_C.php';

    if(isset($_POST['action'])){
        if($_POST['action'] == 'getListProduct'){
            $contr = new product_C();
            $result = $contr->getListProduct();
            echo  ($result);
        }
    }
?>