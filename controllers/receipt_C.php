<?php 
    include_once '../models/receipt_M.php';
    include_once 'Controller.php';

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

        function getProduct($id){
            $model = $this->model("receipt_M");
            $result = $model->getProduct($id);
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
    }
?>