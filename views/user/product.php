<?php include 'header.php';
include 'connect.php';
?>
<div class="row">
    <?php $sql="select * from product "; 
    $result_pr=mysqli_query($conn,$sql);
    while($row_pr=mysqli_fetch_assoc($result_pr)){
    ?>
    <div class="col-md-3 col-sm-6" style="margin-top: 10px; margin-bottom: 10px; " >
        <div class="product-grid"  style="border: solid #a25323 1px; border-radius: 5px 5px;">
            <div class="product-image">
                <a href="#" class="image">
                <img class="pic-1" style="width: 350px; height: 400px;" src=<?php echo "'".$row_pr['Product_Image']."'"?>>
                    <img class="pic-2"  style="width: 350px; height: 400px;" src=<?php echo "'".$row_pr['Product_Image']."'"?>>
                </a>
                <a href="#" class="product-like-icon" data-tip="Yêu Thích">
                    <i class="fa fa-heart"></i>
                </a>
                <ul class="product-links">
                    <li><a href="#"  ><i class="fa fa-eye"></i></a></li>
                    <li><a href="#"><i class="fa fa-shopping-cart" ></i></a></li>
                    <li><a href="#" ><i class="fa fa-random"></i></a></li>
                </ul>
            </div>
            <div class="product-content">
                <h3 class="title"><a href="#"><?php echo $row_pr['Product_Name'] ?></a></h3>
                <div class="price"><?php echo $row_pr['Product_Price'] ?></div>
            </div>
        </div>
    </div>
<?php } ?>

</div>