<?php
session_start();
include ("connect.php");
// unset ($_SESSION['giohanglist']);
if(isset($_SESSION["user"])){
    $check=0;
    $check_ton_tai=0;
    $username_login=$_SESSION['user'];
   
    if(isset($_GET['id_sp'])){
            $id=$_GET['id_sp'];
            // echo var_dump( $_SESSION['giohanglist']);
           if(isset($_SESSION["giohanglist"])){
            $arrList=$_SESSION['giohanglist'];
            for($i=0;$i<count($arrList);$i++){
               if($arrList[$i]['username']==$username_login){
              
                for($j=0;$j<count($arrList[$i]["product"]);$j++){
                   if($arrList[$i]["product"][$j]["id"]==$_GET["id_sp"]&&$arrList[$i]['product'][$j]["status"]==0){
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
                    // echo var_dump($arrList);
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
                echo var_dump($arrList); 
             
                
            }
        
                
                $_SESSION['giohanglist']=$arrList;
                echo var_dump( $_SESSION['giohanglist']);
          

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
