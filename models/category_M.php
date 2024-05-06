<?php 
    include_once 'category_E.php';
    include '../Database/database.php';
    
    class category_M extends connectDB {
        

        public function category(){

        }

        public function addCategory($name){
            $result = false;
            if($this->connectDB()){
                
                $sql = "INSERT INTO Category(Category_Name) VALUES ('" . $name . "')";
                if (mysqli_query($this->conn , $sql) ) {
                    $result =  true;
                } else {
                    echo "Error: " . $sql . "<br>" . $this->conn->error;
                    $result = false ;
                }
            } else {
                echo 'not connect';
            }
            return $result ;
        }

        public function getListCategory(){
            if($this->connectDB()){
                $sql = "SELECT c.Category_ID, c.Category_Name, c.Category_Status,  COUNT(p.Product_ID) AS 'Category_Number'
                        FROM Category c
                        LEFT JOIN Product p ON c.Category_ID = p.Category_ID 
                        GROUP BY c.Category_ID";
                $result = mysqli_query($this->conn, $sql);
                $list= array();
                if(mysqli_num_rows($result) > 0){
                    
                    while($row = mysqli_fetch_array($result) ){
                        $category_item = new Category_E();
                        $category_item->Category_ID = (int) $row['Category_ID'];
                        $category_item->Category_Name = $row['Category_Name'];
                        $category_item->Category_Number =(int) $row['Category_Number'];
                        $category_item->Category_Status = $row['Category_Status'];
                        array_push($list, $category_item) ;
                    }
                }
                
                return $list;
            }
        }

        public function removeCategory($id){
            if($this->connectDB()){
                $sql="UPDATE Category SET Category_Status = 0 WHERE Category_ID = " . $id ;
                if (mysqli_query($this->conn , $sql) ) {
                    return true;
                } else {
                    echo "Error: " . $sql . "<br>" . $this->conn->error;
                   return false;
                }
            }
         
        } 

        public function restartCategory($id){
            if($this->connectDB()){
                $sql="UPDATE Category SET Category_Status = 1 WHERE Category_ID = " . $id ;
                if (mysqli_query($this->conn , $sql) ) {
                    return true;
                } else {
                    echo "Error: " . $sql . "<br>" . $this->conn->error;
                    return false;
                }
            }
        }

        public function editCategory($id,$name){
            if($this->connectDB()){
                $sql="UPDATE Category SET  Category_Name = '" .$name. "'   WHERE Category_ID = " . $id   ;
                if (mysqli_query($this->conn , $sql) ) {
                    return true;
                } else {
                    echo "Error: " . $sql . "<br>" . $this->conn->error;
                    return false;
                }
            }
        }
    }
?>