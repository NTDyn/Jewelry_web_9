<?php 

class Entity_Category{

    public $Category_ID ;
    public $Category_Name ;
    
    public function category($id , $name){
        $this->Category_ID = $id;
        $this->Category_Name = $name;
    }




}
?>