<?php 
    include_once '../../models/category_M.php';
    include_once 'Controller.php';
    
    class category_C extends Controller {

        public $model ;

        public function __construct()
        {
            $this->model = new category_M();
        }

        function addCategory($name){
            $modelCate = $this->model("category_M");
           
            $result = $modelCate->addCategory($name);

            if($result == true ){
            
               $this->view('category', [
                    "resultAdd" => "true"
               ]);
            }
        }
    }

?>