<?php 
    include_once '../models/customer_M.php';
    include_once 'Controller.php';
    include_once '../models/validate_E.php';
    
    
    class customer_C extends Controller {
         
        function getListCustomer(){
            $modelCate = $this->model("customer_M");
            $result = $modelCate->getListCustomer();
            return json_encode($result);
           
        }

        function removeCustomer($id){
            $modelCate = $this->model("Customer_M");
            $result = $modelCate->removeCustomer($id);
            return $result;
        }

        function restartCustomer($id){
            $modelCate = $this->model("Customer_M");
            $result = $modelCate->restartCustomer($id);
            return $result;
        }

        function addCustomer($customer){

            $modelCate = $this->model("Customer_M");
            $errorList = [];

            if($customer->Customer_Name == null || $customer->Customer_Address == null || $customer->Customer_Phone == null || $customer->Customer_Username == null ){
                $result = new validate_E();
                $result->Subject = "Customer_Empty";
                $result->Status = 0;
                $result->Message = "Thông tin không được để trống!";
                array_push($errorList, $result);
                
            } 
            if(!preg_match("/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i", $customer->Customer_Name )  ){
                $result = new validate_E();
                $result->Subject = "Customer_Name";
                $result->Status = 0;
                $result->Message = "Tên khách hàng không chứa số hoặc kí tự đặc biệt!";
                array_push($errorList, $result);
            }
            if (!preg_match('/^([0-9]{10}+$)/', $customer->Customer_Phone )){
                $result = new validate_E();
                $result->Subject = "Customer_Phone";
                $result->Status = 0;
                $result->Message = "Số điện thoại bao gồm 10 số!";
                array_push($errorList, $result);
            }
            if(!preg_match("/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ.,\s]+)$/i", $customer->Customer_Address)  ){
                $result = new validate_E();
                $result->Subject = "Customer_Address";
                $result->Status = 0;
                $result->Message = "Địa chỉ không chứa kí tự đặc biệt!";
                array_push($errorList, $result);
            }

            if(!filter_var($customer->Customer_Email, FILTER_VALIDATE_EMAIL)){
                $result = new validate_E();
                $result->Subject = "Customer_Email";
                $result->Status = 0;
                $result->Message = "Định dạng email không hợp lệ!";
                array_push($errorList, $result);
            }

            if($modelCate->existEmail($customer->Customer_Email)){
                $result = new validate_E();
                $result->Subject = "Customer_Email";
                $result->Status = 0;
                $result->Message = "Email đã tồn tại!";
                array_push($errorList, $result);
            }

            if($modelCate->existPhone($customer->Customer_Phone)){
                $result = new validate_E();
                $result->Subject = "Customer_Phone";
                $result->Status = 0;
                $result->Message = "Số điện thoại đã tồn tại!";
                array_push($errorList, $result);
            }
            
            if($modelCate->existUsername($customer->Customer_Username)){
                $result = new validate_E();
                $result->Subject = "Customer_Username";
                $result->Status = 0;
                $result->Message = "Tên đăng nhập đã tồn tại!";
                array_push($errorList, $result);
            }
            
            if($errorList == null){
                $result = new validate_E();
                $result->Subject = "Customer";
                $result->Status = 200;
                array_push($errorList, $result);
                $modelCate->addCustomer($customer);
                
            } 

            return $errorList;
        }

        

        function getCustomer($id){
            $modelCate = $this->model("customer_M");
            $result = $modelCate->getCustomer($id);
            return json_encode($result);
        }

        function editCustomer($customer){
            $errorList = [];
            $modelCate = $this->model("Customer_M");

            if($customer->Customer_Name == null || $customer->Customer_Address == null || $customer->Customer_Phone == null || $customer->Customer_Username == null ){
                $result = new validate_E();
                $result->Subject = "Customer_Empty";
                $result->Status = 0;
                $result->Message = "Thông tin không được để trống!";
                array_push($errorList, $result);
            } 
            if(!preg_match("/^([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i", $customer->Customer_Name )  ){
                $result = new validate_E();
                $result->Subject = "Customer_Name";
                $result->Status = 0;
                $result->Message = "Tên khách hàng không chứa số hoặc kí tự đặc biệt!";
                array_push($errorList, $result);
            }
            if (!preg_match('/^([0-9]{10}+$)/', $customer->Customer_Phone )){
                $result = new validate_E();
                $result->Subject = "Customer_Phone";
                $result->Status = 0;
                $result->Message = "Số điện thoại bao gồm 10 số!";
                array_push($errorList, $result);
            }
            if(!preg_match("/^([0-9a-zA-Z'. ]+)$/", $customer->Customer_Address)  ){
                $result = new validate_E();
                $result->Subject = "Customer_Address";
                $result->Status = 0;
                $result->Message = "Địa chỉ không chứa kí tự đặc biệt!";
                array_push($errorList, $result);
            }

            if(!filter_var($customer->Customer_Email, FILTER_VALIDATE_EMAIL)){
                $result = new validate_E();
                $result->Subject = "Customer_Email";
                $result->Status = 0;
                $result->Message = "Định dạng email không hợp lệ!";
                array_push($errorList, $result);
            }
            
            if($modelCate->existEmailExID($customer->Customer_Email,  $customer->Customer_ID)){
                $result = new validate_E();
                $result->Subject = "Customer_Email";
                $result->Status = 0;
                $result->Message = "Email đã tồn tại!";
                array_push($errorList, $result);
            }

            if($modelCate->existPhoneExID($customer->Customer_Phone, $customer->Customer_ID)){
                $result = new validate_E();
                $result->Subject = "Customer_Phone";
                $result->Status = 0;
                $result->Message = "Số điện thoại đã tồn tại!";
                array_push($errorList, $result);
            }
            
            if($modelCate->existUsernameExID($customer->Customer_Username,  $customer->Customer_ID)){
                $result = new validate_E();
                $result->Subject = "Customer_Username";
                $result->Status = 0;
                $result->Message = "Tên đăng nhập đã tồn tại!";
                array_push($errorList, $result);
            }


            
            if($errorList == null){
                $result = new validate_E();
                $result->Status = 200;
                array_push($errorList, $result);
                 $modelCate->editCustomer($customer);
                
            } 
          
            return $errorList;
            
        }

        
       
    }

?>