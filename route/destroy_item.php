<?php

session_start();
if(isset($_POST['id_sp'])){
    $id_sp=$_POST['id_sp'];

  $listcart=$_SESSION['giohanglist'];
//   echo count($listcart);
  $user_login=$_SESSION['user'];
  for($i=0;$i<count($listcart);$i++){
    if($listcart[$i]['username']==$user_login){
        for($j=0;$j<count($listcart[$i]['product']);$j++){
            if($listcart[$i]['product'][$j]['id']==$id_sp){
                
             $listcart[$i]['product'][$j]['status']=2;

            }
        }
    }
  }

  $_SESSION['giohanglist']=$listcart;
 
}

?>
   