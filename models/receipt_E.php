<?php 
    class Receipt_E{
        public int $Receipt_ID ;
        public int $Customer_ID ;
        public String $Receipt_Date;
        public int $Receipt_Total ;
        public String $Receipt_Note;
        public int $Receipt_Status ;


        public function Receipt_E($id_receipt, $id_customer ,$date, $total ,$note, $status){
            $this->Receipt_ID = $id_receipt;
            $this->Customer_ID = $id_customer;
            $this->Receipt_Date = $date;
            $this->Receipt_Total = $total;
            $this->Receipt_Note = $note;
            $this->Receipt_Status = $status;
          
        }
    }
?>