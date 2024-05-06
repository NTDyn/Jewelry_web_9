<?php 
    include_once '../models/product_M.php';
    include_once 'Controller.php';

    class product_C extends Controller{
        public function product_C(){
            return new product_C();
        }
        public function getListProduct(){
            $model = $this->model("product_M");
            $result = $model->getListProduct();
            echo json_encode($result);
        }
    }
?>