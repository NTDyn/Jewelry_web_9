<?php 
    include_once '../models/receipt_M.php';
    include_once 'Controller.php';
    include_once '../models/validate_E.php';

    class receipt_C extends Controller{

        function getListReceipt()  {
            $model = $this->model("receipt_M");
            $result = $model->getListReceipt();
            return json_encode($result);
        }

        function getCustomer($id){
            $model = $this->model("receipt_M");
            $result = $model->getCustomer($id);
            return json_encode($result);
        }

        function getDetailOfReceipt($id_receipt){
            $model = $this->model("receipt_M");
            $result = $model->getDetailOfReceipt($id_receipt);
            return json_encode($result);
        }

        function confirmOrder($id_receipt){
            $model = $this->model("receipt_M");
            $result = $model->confirmOrder($id_receipt);
            return json_encode($result);
        }

        
        function deliveredOrder($id_receipt){
            $model = $this->model("receipt_M");
            $result = $model->deliveredOrder($id_receipt);
            return json_encode($result);
        }

        function receivedOrder($id_receipt){
            $model = $this->model("receipt_M");
            $result = $model->receivedOrder($id_receipt);
            return json_encode($result);
        }

        function cancelOrder($id_receipt){
            $model = $this->model("receipt_M");
            $result = $model->cancelOrder($id_receipt);
            return json_encode($result);
        }

        function existCustomer($customer){
            $model = $this->model("receipt_M");
            $result = $model->existCustomer($customer);
            return json_encode($result);
        }
        function checkCustomerInfor($customer){

            $errorList = [];

            if($customer->Customer_Name == null || $customer->Customer_Address == null || $customer->Customer_Phone == null ){
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


            
            if($errorList == null){
                $result = new validate_E();
                $result->Subject = "Customer";
                $result->Status = 200;
                array_push($errorList, $result);
                
            } 

            return $errorList;
        }

        function getAllListProduct(){
            $model = $this->model("receipt_M");
            $result = $model->getAllListProduct();
            echo json_encode($result);
        }
        function getActiveListProduct(){
            $model = $this->model("receipt_M");
            $result = $model->getActiveListProduct();
            echo json_encode($result);
        }

        function addReceipt($receipt, $customer){
            $model = $this->model("receipt_M");
            $result = $model->addReceipt($receipt, $customer);
            return json_encode($result);
        }
        function addReceiptDetail($list){
            $model = $this->model("receipt_M");
            
           $result = $model->addReceiptDetail($list);

            return json_encode($result);
        }

        function getAllHistoryOrder($id){
            $model = $this->model("receipt_M");
           $result = $model->getAllHistoryOrder($id);
            return json_encode($result);
        }


        function searchDateReceipt($start, $end){
            $model = $this->model("receipt_M");
           $result = $model->getListReceipt($start, $end);
            return json_encode($result);
        }
    }


?>