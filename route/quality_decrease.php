<?php
include "../views/user/connect.php";
function getsoluongsanpham($con,$id){
  $sql="select * from prodcut where Product_ID=$id";
  $result=mysqli_query($con,$sql);
  $product=mysqli_fetch_assoc($result);
  return $product;
}
session_start();
if(isset($_POST['id_sp'])){
    $id_sp=$_POST['id_sp'];
   $x=-1;
   $y=-1;
  $listcart=$_SESSION['giohanglist'];
//   echo count($listcart);
  $user_login=$_SESSION['user'];
  for($i=0;$i<count($listcart);$i++){
    if($listcart[$i]['username']==$user_login){
        for($j=0;$j<count($listcart[$i]['product']);$j++){
            if($listcart[$i]['product'][$j]['id']==$id_sp){
                if( $listcart[$i]['product'][$j]['sl']==1){
                    $listcart[$i]['product'][$j]['sl']=1;
                    $x=$i;
                    $y=$j;
                }
                else{
                $listcart[$i]['product'][$j]['sl']-=1;
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
   