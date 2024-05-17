<?php 
    include_once '../models/product_M.php';
    include_once 'Controller.php';
  
       
    class product_C extends Controller{
        public function product_C(){
            return new product_C();
        }

        public function getListProduct(){
        
            $model = $this->model("product_M");
            $sl=$model->getslsp();
           
            $sl=(int)$sl;
            // $get=$_GET['per_page'];
            // echo "<script>alert('$get')</script>";
           $tem_per_page=8;
           $current_page=1;
          $ofset=($current_page-1)*$tem_per_page;
            $result = $model->getListProduct($tem_per_page,$ofset);
            $total_page=ceil($sl/$tem_per_page);
            echo json_encode($result);
        }
    }
?>