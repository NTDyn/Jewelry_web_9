<?php 
    include 'customer_E.php';
    include 'Database/database.php';

    class Customer_M extends connectDB {

        public function customer_M(){
            return new Customer_M();
        }
        
        public function getListCustomer(){
            if($this->connectDB()){
                $sql = "SELECT * FROM Customer ";
                $result = mysqli_query($this->conn, $sql);
                $list= array();
                if(mysqli_num_rows($result) > 0){
                    
                    while($row = mysqli_fetch_array($result) ){
                        $customer = new Customer_E();
                        $customer->Customer_ID = (int) $row['Customer_ID'];
                        $customer->Customer_Name = $row['Customer_Name'];
                        $customer->Customer_Phone = $row['Customer_Phone'];
                        $customer->Customer_Email = $row['Customer_Email'];
                        $customer->Customer_Address = $row['Customer_Address'];
                        $customer->Customer_Username = $row['Customer_Username'];
                        $customer->Customer_Password = $row['Customer_Password'];
                        $customer->Customer_Status = $row['Customer_Status'];
                        array_push($list, $customer) ;
                    }
                }
                
                return $list;
            }
        }

        public function removeCustomer($id){
            if($this->connectDB()){
                $sql = "UPDATE Customer SET Customer_Status = 0 WHERE Customer_ID = ". $id ;
                if(mysqli_query($this->conn, $sql)){
                    return true;
                } else {
                     echo "Error: " . $sql . "<br>" . $this->conn->error;
                     return false;
                }
            }
        }

        public function restartCustomer($id){
            if($this->connectDB()){
                $sql = "UPDATE Customer SET Customer_Status = 1 WHERE Customer_ID = ". $id ;
                if(mysqli_query($this->conn, $sql)){
                    return true;
                } else {
                     echo "Error: " . $sql . "<br>" . $this->conn->error;
                     return false;
                }
            }
        }

        public function addCustomer($customer){
            if($customer->Customer_Status == null){
                $customer->Customer_Status = 0;
            }
            if($this->connectDB()){
                $sql = "INSERT INTO Customer(Customer_Name, Customer_Address, Customer_Phone, Customer_Email, Customer_Username, Customer_Password, Customer_Status) VALUES ('" . $customer->Customer_Name . "' , '" .$customer->Customer_Address."' , '". $customer->Customer_Phone . "' , '". $customer->Customer_Email . "', '" . $customer->Customer_Username . "' , '" . $customer->Customer_Password ."' , " . $customer->Customer_Status ." )";
                if(mysqli_query($this->conn, $sql)){
                    return true;
                } else {
                     echo "Error: " . $sql . "<br>" . $this->conn->error;
                     return false;
                }
            }
        }

        public function getCustomer($id){
            if($this->connectDB()){
                $sql = "SELECT * FROM Customer WHERE Customer_ID = " . $id;
                $result = mysqli_query($this->conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    
                    if($row = mysqli_fetch_array($result) ){
                        $customer = new Customer_E();
                        $customer->Customer_ID = (int) $row['Customer_ID'];
                        $customer->Customer_Name = $row['Customer_Name'];
                        $customer->Customer_Phone = $row['Customer_Phone'];
                        $customer->Customer_Email = $row['Customer_Email'];
                        $customer->Customer_Address = $row['Customer_Address'];
                        $customer->Customer_Username = $row['Customer_Username'];
                        $customer->Customer_Password = $row['Customer_Password'];
                        $customer->Customer_Status = $row['Customer_Status'];
                    }
                }
            }
            return $customer;
        }

        public function editCustomer($customer){
            if($this->connectDB()){
                $sql = "UPDATE Customer SET Customer_Name = '" .$customer->Customer_Name . "' , Customer_Address = '" .$customer->Customer_Address . "', Customer_Phone = '". $customer->Customer_Phone ."', Customer_Username = '" . $customer->Customer_Username . "' , Customer_Email = '" .$customer->Customer_Email . "' WHERE Customer_ID = " . $customer->Customer_ID;
                if(mysqli_query($this->conn, $sql)){
                    return true;
                } else {
                     echo "Error: " . $sql . "<br>" . $this->conn->error;
                     return false;
                }
            
            }
        }

        public function existEmail($gmail){
            if($this->connectDB()){
                $sql = "SELECT * FROM Customer WHERE Customer_Email = '" . $gmail . "'";
                $result = mysqli_query($this->conn, $sql);
                
                if(mysqli_num_rows($result) > 0){
                    return true;
                } else {
                    return false;
                }
            
            } 
        }

        public function existEmailExID($gmail , $id){
            if($this->connectDB()){
                $sql = "SELECT * FROM Customer WHERE Customer_Email = '" . $gmail . "' AND Customer_ID != " .$id;
                $result = mysqli_query($this->conn, $sql);
                
                if(mysqli_num_rows($result) > 0){
                    return true;
                } else {
                    return false;
                }
            
            } 
        }

        public function existPhone($phone){
            if($this->connectDB()){
                $sql ="SELECT * FROM Customer WHERE Customer_Phone = '" . $phone . "'";
                $result = mysqli_query($this->conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    return true;
                } else {
                    return false;
                }
            }
        }

        // check is exist phone number except id 
        public function existPhoneExID($phone, $id){
            if($this->connectDB()){
                $sql ="SELECT * FROM Customer WHERE Customer_Phone = '" . $phone . "' AND Customer_ID != " . $id;
                $result = mysqli_query($this->conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    return true;
                } else {
                    return false;
                }
            }
        }

        public function existUsername($username){
            if($this->connectDB()){
                $sql ="SELECT * FROM Customer WHERE Customer_Username = '" . $username . "'";
                $result = mysqli_query($this->conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    return true;
                } else {
                    return false;
                }
            }
        }

        public function existUsernameExID($username, $id){
            if($this->connectDB()){
                $sql ="SELECT * FROM Customer WHERE Customer_Username = '" . $username . "' AND Customer_ID != " . $id;
                $result = mysqli_query($this->conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
?>