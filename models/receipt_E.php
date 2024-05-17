<?php 
    class Receipt_E{
        public int $Receipt_ID ;
        public int $Customer_ID ;
        public String $Receipt_Date;
        public int $Receipt_Total ;
        public String $Receipt_Note;
        public String $Receipt_Reason ;
        public String $Receipt_Payment ;
        public int $Receipt_Status ;
        public String $Customer_Name ;
        public String $Customer_Phone;
        public String $Receipt_Address ;
        public int $Admin_ID ;


        public function Receipt_E($id_receipt, $id_customer ,$date, $total ,$note,$reason, $payment, $status, $cus_name, $cus_phone,$address, $admin){
            $this->Receipt_ID = $id_receipt;
            $this->Customer_ID = $id_customer;
            $this->Receipt_Date = $date;
            $this->Receipt_Total = $total;
            $this->Receipt_Note = $note;
            $this->Receipt_Reason = $reason;
            $this->Receipt_Payment = $payment;
            $this->Receipt_Status = $status;
            $this->Customer_Name = $cus_name;
            $this->Customer_Phone = $cus_phone;
            $this->Receipt_Address = $address;
            $this->Admin_ID = $admin;
          
        }
    }
?>