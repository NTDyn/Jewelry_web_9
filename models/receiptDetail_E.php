<?php 
    class ReceiptDetail_E{
        public int $Detail_ID;
        public int $Receipt_ID ;
        public int $Product_ID ;
        public String $Detail_Quantity;
        public int $Detail_Price ;

        public String $Receipt_Note;

        public function ReceiptDetail_E($id_detail, $id_receipt, $id_product ,$quantity, $price , $note){
            $this->Detail_ID = $id_detail;
            $this->Receipt_ID = $id_receipt;
            $this->Product_ID = $id_product;
            $this->Detail_Quantity = $quantity;
            $this->Detail_Price = $price;
            $this->Receipt_Note = $note;
        }

        
    }
?>