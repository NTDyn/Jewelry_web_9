<?php 

class Category_E{

    public int $Category_ID ;
    public string $Category_Name ;
    public int  $Category_Number ;
    public bool $Category_Status ;

    
    public function category($id , $name , $number, $status){
        $this->Category_ID = $id;
        $this->Category_Name = $name;
        $this->Category_Number = $number ;
        $this->Category_Status = $status;
    }




}
?>