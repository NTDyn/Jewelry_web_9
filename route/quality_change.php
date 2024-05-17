<?php

session_start();
include "../views/user/connect.php";
function getsoluongsanpham($con,$id){
  $sql="select * from product where Product_ID=$id";
  $result=mysqli_query($con,$sql);
  $product=mysqli_fetch_assoc($result);
  return $product;
}
if(isset($_POST['id_sp'])){
    $id_sp=$_POST['id_sp'];
    $product=getsoluongsanpham($conn,$id_sp);
   
   $x=-1;
   $y=-1;
  $listcart=$_SESSION['giohanglist'];
  $user_login=$_SESSION['user'];
  for($i=0;$i<count($listcart);$i++){
    if($listcart[$i]['username']==$user_login){
        for($j=0;$j<count($listcart[$i]['product']);$j++){
            if($listcart[$i]['product'][$j]['id']==$id_sp){
                if(($product["Product_Quality"]-$listcart[$i]['product'][$j]['sl'])<=0){
                  echo "Số lượng trong kho không đủ";
                  return;
                }
              if( $listcart[$i]['product'][$j]['sl']==10){
                $listcart[$i]['product'][$j]['sl']=10;
                $x=$i;
                $y=$j;
            }
            else{
            $listcart[$i]['product'][$j]['sl']+=1;
            $x=$i;
            $y=$j;
            }
            }
        }
    }
  }
  echo  $listcart[$x]['product'][$y]['sl'];

  $_SESSION['giohanglist']=$listcart;
 
}

?>
   