<?php 
    include '../Database/database.php';
    include 'product_E.php';

    class product_M extends connectDB{

        public function getListProduct(){
           
            if($this->connectDB()){
                $sql = "SELECT * FROM Product WHERE Product_Status = 1  ";
                $result = mysqli_query($this->conn , $sql);
                $list= array(); 
                if(mysqli_num_rows($result) > 0){
                    
                    while($row = mysqli_fetch_array($result) ){
                        $pr = new Product_E();
                        $pr->Product_ID = (int) $row['Product_ID'];
                        $pr->Product_Name =  $row['Product_Name'];
                        $pr->Category_ID = (int) $row['Category_ID'];
                        $pr->Product_Price = (int) $row['Product_Price'];
                        $pr->Product_Quality = (int) $row['Product_Quality'];
                        $pr->Product_Describe=  $row['Product_Describe'];
                        $pr->Product_Image = $row['Product_Image'];
                        $pr->Product_Status = (int) $row['Product_Status'];
                        array_push($list, $pr) ;
                    }
                }
                
                return $list;
            }
        }
        
        public function getslsp(){
            if($this->connectDB()){
                $sl=0;
                $sql="SELECT * from product WHERE Product_Status =1 ";
                $result=mysqli_query($this->conn,$sql);
               
                $sl=$result->num_rows;
                
            }
            return $sl;
        }
    }

?>