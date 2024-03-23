<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    
    <style>
      <?php include '../../assests/user/css/bootstrap/bootstrap.min.css'; ?>
      <?php include '../../assests/user/css/index.css'; ?>
    </style>
    <link href="../../assests/user/css/fonts/font-awesome.min.css" rel="stylesheet">
    <link href="../../assests/user/css/iconfonts/icons.css" rel="stylesheet">
    <link href="../../assests/user/css/iconfonts/plugin.css" rel="stylesheet">
</head>

<body>
    <div class="">

    <?php include 'header.php';?>

        <div class = "body">
          <div class="carousel-area">
               <!-- Carousel -->
            <div id="demoCarousel" class="carousel slide" data-bs-ride="carousel">
              <!-- Indicators/dots -->
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#demoCarousel" data-bs-slide-to = "0" class="active"></button>
                <button type="button" data-bs-target="#demoCarousel" data-bs-slide-to = "1" ></button>
                <button type="button" data-bs-target="#demoCarousel" data-bs-slide-to = "2" ></button>
              </div>
  
              <!-- The slideshow/carousel -->
              <div class="carousel-inner" >
                <div class="carousel-item  active">
                  <?php echo '<img src="../../image/bridal-jewelry-at-keepsakes-jewelry.jpg" alt="carousel-1" class="d-block w-100 carousel-picture">'?>
                </div>
                <div class="carousel-item ">
                  <?php echo '<img src="../../image/carousel-2.jpg" alt="carousel-2" class="d-block w-100 carousel-picture">' ?>
                </div>
                <div class="carousel-item ">
                  <?php echo '<img src="../../image/carousel-3.jpg" alt="carousel-3" class="d-block w-100 carousel-picture">'?>
                </div>
              </div>
  
              <!-- Left and right controls/icons -->
              <button class="carousel-control-prev" type="button" data-bs-target="#demoCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#demoCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
              </button>
          </div>
           
          </div>
          <div class="row pic-jewelry-container">
            <div class="col-3 pic-jewelry-area" >
              <img src = "../../image/bracelet.jpg" class="pic-jewelry">
              <span>Our signature pieces designed to be worn everyday with subtle details</span>
            </div>
            <div class="col-3 pic-jewelry-area">
              <img src = "../../image/necklace.jpg" class="pic-jewelry">
              <span>Unique pieces that are carefully crafted to ensure that you'll love for a lifetime</span>
            </div>
            <div class="col-3 pic-jewelry-area">
              <img src = "../../image/earring.jpg" class="pic-jewelry">
              <span>Timeless and wearable earrings with a modern twist that add a touch of style to any outfit</span>
            </div>
          </div>
          
          
        </div>
        
     <?php include 'footer.php';?>
      
    </div>

</body>
</html>
<script><?php require("../../assests/user/js/jquery.min.js"); ?></script>
<script><?php require("../../assests/user/js/bootstrap/bootstrap.bundle.min.js");?></script>