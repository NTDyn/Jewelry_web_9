<?php 
    include_once '../models/category_M.php';
    include_once 'Controller.php';
    
    
    class category_C extends Controller {

        public $model ;
        
        public function __construct()
        {
            $this->model = new category_M();
        }
        


        function addCategory($name){
            $modelCate = $this->model("category_M");
            $result =  $modelCate->addCategory($name);
            return $result;
        }

        function getListCategory(){
            $modelCate = $this->model("category_M");
            $result = $modelCate->getListCategory();
            return json_encode($result);
           
        }

        function removeCategory($id){
            $modelCate = $this->model("category_M");
            $result = $modelCate->removeCategory($id);
            echo json_encode($result);
        }

        function restartCategory($id){
            $modelCate = $this->model("category_M");
            $result = $modelCate->restartCategory($id);
            echo json_encode($result);
        }

        function editCategory($id, $name){
            $modelCate = $this->model("category_M");
            $result = $modelCate->editCategory($id,$name);
            echo json_encode($result);
        }
        
       
    }

?>