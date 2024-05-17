<?php 
    class ReceiptDetail_E{
        public int $Detail_ID;
        public int $Receipt_ID ;
        public int $Product_ID ;
        public String $Detail_Quantity;
        public int $Detail_Price ;
        public String $Receipt_Note;
        public String $Receipt_Payment ;
        public String $Product_Image;
        public String $Product_Name ;
        public String $Admin_Name ;

        public function ReceiptDetail_E($id_detail, $id_receipt, $id_product ,$quantity, $price , $payment , $note, $product_img, $product_name, $admin){
            $this->Detail_ID = $id_detail;
            $this->Receipt_ID = $id_receipt;
            $this->Product_ID = $id_product;
            $this->Detail_Quantity = $quantity;
            $this->Detail_Price = $price;
            $this->Receipt_Payment = $payment;
            $this->Receipt_Note = $note;
            $this->Product_Image = $product_img;
            $this->Product_Name = $product_name;
            $this->Admin_Name = $admin;
        }

        
    }
?>