<?php 
    include 'receipt_E.php';
    include 'customer_E.php';
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
                $sql ="SELECT * FROM receipt_detail de , receipt re WHERE de.Receipt_ID = re.Receipt_ID AND re.Receipt_ID =  " . $id_receipt;
                $result = mysqli_query($this->conn, $sql);
                $list =  array();
                if(mysqli_num_rows($result) > 0){
                    
                    while($row = mysqli_fetch_array($result) ){
                        $detail = new ReceiptDetail_E();
                        $detail->Detail_ID = (int) $row['Detail_ID'];
                        $detail->Receipt_ID = $row['Receipt_ID'];
                        $detail->Product_ID = $row['Product_ID'];
                        $detail->Detail_Quantity = $row['Detail_Quantity'];
                        $detail->Detail_Price = $row['Detail_Price'];
                        $detail->Receipt_Note = $row['Receipt_Note'];
                        array_push($list, $detail);
                    }
                }
                return $list ;
            }
        }

        public function getProduct($id){
            if($this->connectDB()){
                $sql ="SELECT * FROM Product WHERE Product_ID = " . $id;
                $result = mysqli_query($this->conn, $sql);
                if($row = mysqli_fetch_array($result) ){
                    $name = $row['Product_Name'];
                }
                return $name;
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
    }
?>