<?php
session_start();
include ("connect.php");

function getslsanpham($con,$id){
$sql="select * from product where Product_ID=$id";
$result=mysqli_query($con,$sql);
$getsp=mysqli_fetch_assoc($result);
return $getsp;
}
if(isset($_SESSION["user"])){
    $check=0;
    $check_ton_tai=0;
    $username_login=$_SESSION['user'];
   
    if(isset($_GET['id_sp'])){
            $id=$_GET['id_sp'];
            $getspthem=getslsanpham($conn,$id);
            if($getspthem["Product_Quality"]==0){
                echo "Sản phẩm hiện đang hết!";
                return ;
            }
             
           if(isset($_SESSION["giohanglist"])){
            $arrList=$_SESSION['giohanglist'];
            for($i=0;$i<count($arrList);$i++){
               if($arrList[$i]['username']==$username_login){
              
                for($j=0;$j<count($arrList[$i]["product"]);$j++){
                   if($arrList[$i]["product"][$j]["id"]==$_GET["id_sp"]&&$arrList[$i]['product'][$j]["status"]==0){
                    if($getspthem['Product_Quality']-$arrList[$i]["product"][$j]['sl']==0){
                        echo "số lượng trong kho không đủ";
                        return;
                    }
                    if($arrList[$i]["product"][$j]['sl']==10){
                        echo "Số lượng sản phẩm trong giỏ hàng vượt mức cho phép";
                        return;
                    }
                   $arrList[$i]['product'][$j]['sl']=$arrList[$i]['product'][$j]['sl']+1;
                
                    $check=1;
                   }
                }
                if($check==0){
                    $sanpham=[
                        "id"=>$_GET['id_sp'],
                        "sl"=>1,
                        "status"=>0
                    ];
                    array_push($arrList[$i]['product'],$sanpham);
        
                }
                $check_ton_tai=1;
               }
            }
            if($check_ton_tai==0){
                $cart_add=[
                    
                    "username"=>$_SESSION["user"],
                    'product'=>[
                        [
                            "id"=>$id,
                            "sl"=>1,
                            "status"=>0
                        ]
                       
                    ]
                    
                ];
                
                 
                array_push($arrList,$cart_add);
               
             
                
            }
        
                
                $_SESSION['giohanglist']=$arrList;
               
          

           }
            
           else if(!isset($_SESSION['giohanglist'])){
            $cart=[
                [
                "username"=>$_SESSION['user'],
                'product'=>[
                    [
                        "id"=>$id,
                        "sl"=>1,
                        "status"=>0
                    ]
                   
                ]
                    ],
                  
            ];
            $_SESSION['giohanglist']=$cart; 
          
          
            // echo var_dump( $_SESSION['giohanglist']);
                // echo var_dump($cart);
                // echo $cart[0]['username'];
                // echo $cart[1]["username"];
               
        }
       
      
           
}

}
// header("Location:product.php");


?>
