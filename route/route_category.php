<?php 
    include '../controllers/category_C.php';

    if(isset($_POST['action'])){
        if($_POST['action'] == "add"){
            $contr = new category_C(); 
            $name =$_POST['txtCategory'];
            $result = $contr->addCategory($name);
            return $result;
        }
    
    }

    // Get list of Category
    if(isset($_POST['action'] )){
        if($_POST['action'] =="read"){
            $contr = new category_C(); 
            $result = $contr->getListCategory();
            echo($result);
        }
        
    }
    
    if(isset($_POST['action'])){
        if($_POST['action'] == "remove"){
            $contr = new category_C(); 
            $id =$_POST['id_remove'];
            $result = $contr->removeCategory($id);
            return $result;
        }
    
    }

    if(isset($_POST['action'])){
        if($_POST['action'] == "restart"){
            $contr = new category_C(); 
            $id =$_POST['id_restart'];
            $result = $contr->restartCategory($id);
            return $result;
        }
    
    }

    if(isset($_POST['action'])){
        if($_POST['action'] == "edit"){
            $contr = new category_C(); 
            $name =$_POST['txt_edit_category'];
            $id = $_POST['id_edit_category'];
            $result = $contr->editCategory($id,$name);
            return $result;
        }
    
    }
?>