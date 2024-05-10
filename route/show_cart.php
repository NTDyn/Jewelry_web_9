
<?php
// session_start();


function getHTML($conn){
    $html_cart="";
    if(isset($_SESSION['giohanglist'])){
    $list_cart=$_SESSION['giohanglist'];
    $get_login=$_SESSION['user'];
   
    if(count($list_cart)==0){
        $html_cart="";

    }else{
    for($i=0;$i<count($list_cart);$i++){

        if($list_cart[$i]['username']==$get_login){
            for($j=0;$j<count($list_cart[$i]['product']);$j++){
           
              if($list_cart[$i]['product'][$j]['status']==0&&checkstatussanpham($list_cart[$i]['product'][$j]['id'],$conn)!=0){
                $getsp=getsp($conn,(int)$list_cart[$i]['product'][$j]['id']);
                $html_cart.='<div class="row item-product-cart" id="'.$getsp["Product_ID"].'">
                <div class="col-2">
                  <img src="'.$getsp['Product_Image'].'" class="img-product-cart">
                </div>
                <div class="col-3 name-product-cart">'.$getsp['Product_Name'].'</div>
                <div class="col-2 color-product-cart">
                  <img src="../../image/color-pink.jpg" class="col-1 color-prd">
                </div>
                <div class="col-3">
                <input onclick="giamsl('.$list_cart[$i]['product'][$j]['id'].','.$getsp["Product_Price"].',this)" class="btgiam" style="width:30px;margin-left:10px"" type="button" value="-">
                  <span  class="quality-product-cart">'.(int)$list_cart[$i]['product'][$j]['sl'].'</span>
                  <input onclick="tangsl('.$list_cart[$i]['product'][$j]['id'].','.$getsp["Product_Price"].',this)" class="bttang" style="width:30px;margin-left:10px"" type="button" value="+">
                  <span class="sl" >'.$getsp["Product_Price"]*$list_cart[$i]['product'][$j]['sl'].'</span>

                </div>
                
                <div class="col-1"><input name="id_select[]" value='.$getsp["Product_ID"].'  type="checkbox" ></div>
        
                <div onclick="delete_sp('.$list_cart[$i]['product'][$j]['id'].',this)" class="col-1 fa fa-remove delete"></div>
              </div>';
            }
            }
        }
    }
}
    }
    return $html_cart;
}
function getsp($con,$id){
$sql_getsp="select * from product where Product_ID=$id";
$result=mysqli_query($con,$sql_getsp);
$sp=mysqli_fetch_assoc($result);
return $sp;

}
function checkstatussanpham($id,$con){


        $sql="select * from product where Product_ID=$id";
        $result=mysqli_query($con,$sql);
        $getsp=mysqli_fetch_assoc($result);
        $get=$getsp['Product_Status'];
        if( $getsp["Product_Status"]==0 ){
         return 0;
        }
        return 1;
}
?>
<script>
    function tangsl(id,gia,x){

        $.post("../../route/quality_change.php", {id_sp:id}, function(data){
          var cha= x.parentElement;
          var update_sl=cha.children[1];
          update_sl.innerHTML=data;
          var update_gia=cha.children[3];
          var tt=parseInt(data,10)*gia;
          update_gia.innerHTML=tt;
        });

       
}
function giamsl(id,gia,x){

$.post("../../route/quality_decrease.php", {id_sp:id}, function(data){
  var cha= x.parentElement;
  var update_sl=cha.children[1];
  update_sl.innerHTML=data;
  var update_gia=cha.children[3];
  var tt=parseInt(data,10)*gia;
  update_gia.innerHTML=tt;
});


}
function delete_sp(id,x){
  $.post("../../route/destroy_item.php", {id_sp:id}, function(data){

    var parent=x.parentElement;
parent.remove();
  

});


}
</script>

<!-- <button class="fa fa-plus plus-btn" ></button> -->
<!-- <button class="fa fa-minus minus-btn" ></button> -->
