<?php 
    class product_E{
        public int $Product_ID ;
        public String $Product_Name ;
        public int $Category_ID;
        public int $Product_Price;
        public int $Product_Quality ;
        public String $Product_Describe ;
        public String $Product_Image ;
        public int $Product_Status;

        public function product_E($pro_ID , $name , $cate_id , $price , $quality , $decribe , $image , $status){
            $this->Product_ID = $pro_ID;
            $this->Product_Name = $name;
            $this->Category_ID = $cate_id ;
            $this->Product_Price = $price ;
            $this->Product_Quality = $quality;
            $this->Product_Describe = $decribe ; 
            $this->Product_Image = $image;
            $this->Product_Status = $status; 
        }
    }
?>