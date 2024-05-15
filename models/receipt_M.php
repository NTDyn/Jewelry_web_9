<?php 
    include 'receipt_E.php';
    include 'customer_E.php';
    include 'product_E.php';
    include 'receiptDetail_E.php';
    include '../Database/database.php';

    class receipt_M extends connectDB{

        public function receipt_M(){
            return new receipt_M();
        }

        public function getListReceipt(){
            if($this->connectDB()){
                $sql = "SELECT * FROM Receipt";
                $result = mysqli_query($this->conn, $sql);
                $list= array();
                if(mysqli_num_rows($result) > 0){
                    
                    while($row = mysqli_fetch_array($result) ){
                        $receipt = new Receipt_E();
                        $receipt->Receipt_ID = (int) $row['Receipt_ID'];
                        $receipt->Customer_ID = (int) $row['Customer_ID'];
                        $receipt->Receipt_Date = $row['Receipt_Date'];
                        $receipt->Receipt_Total = (int) $row['Receipt_Total'];
                        $receipt->Receipt_Note = (int) $row['Receipt_Note'];
                        $receipt->Receipt_Status = (int) $row['Receipt_Status'];
                        array_push($list, $receipt) ;
                    }
                }
                
                return $list;
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

        public function getDetailOfReceipt($id_receipt){
            if($this->connectDB()){
                $sql ="SELECT * FROM receipt_detail de , receipt re, product pr WHERE de.Receipt_ID = re.Receipt_ID AND pr.Product_ID = de.Product_ID AND re.Receipt_ID =  " . $id_receipt;
                $result = mysqli_query($this->conn, $sql);
                $list =  array();
                if(mysqli_num_rows($result) > 0){
                    
                    while($row = mysqli_fetch_array($result) ){
                        $detail = new ReceiptDetail_E();
                        $detail->Detail_ID = (int) $row['Detail_ID'];
                        $detail->Receipt_ID = $row['Receipt_ID'];
                        $detail->Product_ID = $row['Product_ID'];
                        $detail->Detail_Quantity = $row['Detail_Quality'];
                        $detail->Detail_Price = $row['Detail_Price'];
                        $detail->Product_Image = $row['Product_Image'];
                        $detail->Product_Name = $row['Product_Name'];
                        if($row['Receipt_Note'] == null){
                            $detail->Receipt_Note ="";
                        } else {
                            $detail->Receipt_Note = $row['Receipt_Note'];
                        }
                        
                        array_push($list, $detail);
                    }
                }
                return $list ;
            }
        }


        public function confirmOrder($id_receipt){
            if($this->connectDB()){
                $sql ="UPDATE Receipt SET Receipt_Status = 2 WHERE Receipt_ID = " . $id_receipt;
                if(mysqli_query($this->conn, $sql)){
                    return true;
                } else {
                     echo "Error: " . $sql . "<br>" . $this->conn->error;
                     return false;
                }
            }
        }
       
        public function deliveredOrder($id_receipt){
            if($this->connectDB()){
                $sql ="UPDATE Receipt SET Receipt_Status = 3 WHERE Receipt_ID = " . $id_receipt;
                if(mysqli_query($this->conn, $sql)){
                    return true;
                } else {
                     echo "Error: " . $sql . "<br>" . $this->conn->error;
                     return false;
                }
            }
        }

        public function receivedOrder($id_receipt){
            if($this->connectDB()){
                $sql ="UPDATE Receipt SET Receipt_Status = 4 WHERE Receipt_ID = " . $id_receipt;
                if(mysqli_query($this->conn, $sql)){
                    return true;
                } else {
                     echo "Error: " . $sql . "<br>" . $this->conn->error;
                     return false;
                }
            }
        }
        public function cancelOrder($id_receipt){
            if($this->connectDB()){
                $sql ="UPDATE Receipt SET Receipt_Status = 0 WHERE Receipt_ID = " . $id_receipt;
                if(mysqli_query($this->conn, $sql)){
                    return true;
                } else {
                     echo "Error: " . $sql . "<br>" . $this->conn->error;
                     return false;
                }
            }
        }

        public function existCustomer($customer){
            if($this->connectDB()){
                $sql ="SELECT * FROM Customer WHERE Customer_Phone = '" . $customer->Customer_Phone . "'";
                $result = mysqli_query($this->conn, $sql);
                if($result){
                   if( $row = mysqli_fetch_array($result) ){
                    $customer = new Customer_E();
                    $customer->Customer_ID = (int) $row['Customer_ID'];
                    $customer->Customer_Name = $row['Customer_Name'];
                    $customer->Customer_Phone = $row['Customer_Phone'];
                    $customer->Customer_Email = $row['Customer_Email'];
                    $customer->Customer_Address = $row['Customer_Address'];
                    $customer->Customer_Username = $row['Customer_Username'];
                    $customer->Customer_Password = $row['Customer_Password'];
                    $customer->Customer_Status = $row['Customer_Status'];
                    return $customer;
                   } else{
                        return false ;
                   }
                   
                } else {
                     echo "Error: " . $sql . "<br>" . $this->conn->error;
                     return false;
                }

            }
        }
        public function getListProduct(){
            if($this->connectDB()){
                $sql = "SELECT * FROM Product WHERE Product_Status = 1";
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
                        $pr->Product_Image =  $row['Product_Image'];
                        $pr->Product_Status = (int) $row['Product_Status'];
                        array_push($list, $pr) ;
                    }
                }
                
                return $list;
            }
        }

        public function addReceipt($receipt){
            if($this->connectDB()){
                $sql = "INSERT INTO Receipt(Customer_ID, Receipt_Date, Receipt_Total, Receipt_Note, Receipt_Status) VALUES( " . $receipt->Customer_ID . ", '" . $receipt->Receipt_Date . "' , " . $receipt->Receipt_Total. " , '".$receipt->Receipt_Note ."' , 2)";
               
                if(mysqli_query($this->conn, $sql)){
                    return true;
                } else {
                     echo "Error: " . $sql . "<br>" . $this->conn->error;
                     return false;
                }
            }
        }
        public function addReceiptDetail($list){
            if($this->connectDB()){
                $sql = "SELECT MAX(Receipt_ID) FROM Receipt";
                $result1 =mysqli_query($this->conn, $sql);
                $max = 0 ;
                $result = false;
                if($result1){
                    $row = mysqli_fetch_array($result1);
                    $max =(int) $row['MAX(Receipt_ID)'];
                }
                foreach($list as $detail){
                   $query =" INSERT INTO Receipt_Detail(Receipt_ID, Product_ID, Detail_Quality,Detail_Price) VALUES(" . $max . ", ". $detail['Product_ID'] . ", " . $detail['Quantity'] . ", ". $detail['Price'] . ")";
                    $result2 = mysqli_query($this->conn, $query);
                     if($result2){
                         $result =  true;
                     } else {
                         echo "Error: " . $query . "<br>" . $this->conn->error;
                         
                     }
                }

                
               return $result ;
                
            }
        }

        public function getAllHistoryOrder($id){
            if($this->connectDB()){
                $sql = "SELECT * FROM Receipt re WHERE  re.Customer_ID = " . $id;
                $result = mysqli_query($this->conn , $sql);
                $list= array();
                if(mysqli_num_rows($result) > 0){
                    
                    while($row = mysqli_fetch_array($result) ){
                        $receipt = new Receipt_E();
                        $receipt->Receipt_ID = (int) $row['Receipt_ID'];
                        $receipt->Customer_ID = (int) $row['Customer_ID'];
                        $receipt->Receipt_Date = $row['Receipt_Date'];
                        $receipt->Receipt_Total = (int) $row['Receipt_Total'];
                        $receipt->Receipt_Note = (int) $row['Receipt_Note'];
                        $receipt->Receipt_Status = (int) $row['Receipt_Status'];

                        array_push($list, $receipt) ;
                    }
                }
                
                return $list;
            }
        }

        
    }
?>