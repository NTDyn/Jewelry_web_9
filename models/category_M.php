<?php 
    include_once '../models/category_E.php';
    include_once './Database/database.php';
    
    class Model_Category{
        

        public function category(){

        }

        public function addCategory($name){
            $conn = mysqli_connect('localhost','root','','jewerly',3309);
            $sql = "INSERT INTO Category (Category_Name) VALUES ('Day chuyen')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

    }
?>