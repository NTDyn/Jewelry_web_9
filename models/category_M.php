<?php 
    include_once '../../models/category_E.php';
    include 'Database/database.php';
    
    class category_M extends connectDB {
        

        public function category(){

        }

        public function addCategory($name){
                    
                    if($this->connectDB()){
         
                        $sql = "INSERT INTO Category(Category_Name) VALUES ('" . $name . "')";
                        if (mysqli_query($this->conn , $sql) ) {
                            return true;
                        } else {
                            echo "Error: " . $sql . "<br>" . $this->conn->error;
                            return false;
                        }
                    } 
                    else {
                        echo 'not connect';
                    }
                    
                

        }

    }
?>