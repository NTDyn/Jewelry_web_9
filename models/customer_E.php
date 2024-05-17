<?php 

class customer_E{

    public int $Customer_ID;
    public String $Customer_Name ;
    public String $Customer_Phone;
    public String $Customer_Address ;
    public String $Customer_Username ;
    public String $Customer_Password ;
    public String $Customer_Email ;
    public int $Customer_Status ;

    public int $Customer_TotalMoney ;

    public int $Customer_TotalBill;

    public function Customer_E($id, $name , $phone , $address, $username , $password , $email, $status, $money, $bill){
        $this->Customer_ID = $id;
        $this->Customer_Name = $name ; 
        $this->Customer_Phone = $phone;
        $this->Customer_Address = $address;
        $this->Customer_Username = $username;
        $this->Customer_Password = $password ;
        $this->Customer_Email = $email;
        $this->Customer_Status = $status;
        $this->Customer_TotalMoney = $money;
        $this->Customer_TotalBill = $bill;
    }


}
?>