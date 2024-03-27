<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    
    <style>
      <?php include '../../assests/user/css/bootstrap/bootstrap.min.css'; ?>
      <?php include '../../assests/user/css/home.css'; ?>
      <?php include '../../assests/user/css/aos/aos.css'; ?>
      
    </style>
    <link href="../../assests/user/css/fonts/font-awesome.min.css" rel="stylesheet">
    <link href="../../assests/user/css/iconfonts/icons.css" rel="stylesheet">
    <link href="../../assests/user/css/iconfonts/plugin.css" rel="stylesheet">

</head>

<?php 
  function setInterval( $milisecond, $goal){
    $start = 0;
    $second = $milisecond/1000 ;
    $text = '<div class = "counting">';
    
    while($start <= $goal){
      $start++;
      sleep($second);
       echo $start;
    }

  }
?>
<body>


    <div class="">

        <div class = "body">

        <!-- Carousel -->
          <div class="carousel-area">
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

        <!-- quote -->
          <div class="quote-area">
            <span id= "quote">Wearing jewelry is a way to express the woman you are without saying a word!</span>
          </div>

        <!--introduce-->
          <div class="row pic-jewelry-container" data-aos="zoom-out-down">
            <div class="col-4 introduce-item" >
              <div class="pic-jewelry-area">
                <img src = "../../image/bracelet.jpg" class="pic-jewelry">
              </div>
              <div class="intro-passage">
                <span>Unique pieces that are carefully crafted to ensure that you'll love for a lifetime</span>
              </div>
            </div>
            <div class="col-4 introduce-item" >
              <div class="pic-jewelry-area">
                <img src = "../../image/necklace.jpg" class="pic-jewelry">
              </div>
              <div class="intro-passage">
                <span>Unique pieces that are carefully crafted to ensure that you'll love for a lifetime</span>
              </div>
            </div>
            <div class="col-4 introduce-item" >
              <div class="pic-jewelry-area">
                <img src = "../../image/earring.jpg" class="pic-jewelry">
              </div>
              <div class="intro-passage ">
                <span>Unique pieces that are carefully crafted to ensure that you'll love for a lifetime</span>
              </div>
            </div>
          </div>
        
        <!--collection -->
          <div class="collections container-fluid">
          <div class="row">
            <div class="col-5 collection-img-area" data-aos="fade-right">
              <?php echo '<img src="../../image/Serena-Jewelry.png" class="collection-img">' ?>
            </div>
            <div class="col-7 collection-passage" data-aos="fade-left">
              <div id="name-branch">SERENA JEWELRY</div></br>
              <span style="font-size: 20px;"> Vươn mình đón ánh bình minh, đóa hoa hướng dương rực rỡ giữa mênh mông đất trời đã vẽ nên bức tranh thiên nhiên tràn đầy sức sống.</span>
            </div>
            <div class="row " >
              <div class="col-7 collection-passage " data-aos="fade-right">
                <div id="name-branch">SERENA JEWELRY</div></br>
                <span  style="font-size: 20px;"> Nét đẹp kiêu hãnh chính là nguồn cảm hứng bất tận cho bộ sưu tập trang sức Serena – lời ca ngợi cho tinh thần lạc quan, tích cực của những cô nàng hiện đại.</span>
              </div>
              <div class="col-5 collection-img-area" data-aos="fade-left">
                <?php echo '<img src="../../image/collection2.jpg" class="collection-img">' ?>
              </div>
            </div>
          </div>
          </div>
        
        <!--achievement-->
          <div class="container-fluid achievement row">
            <div id="experience" data-aos="flip-down">The Serena Experience</div>
            <div class="col-4 achieve-item" data-aos="fade-down">
              <div class = "image-achievement-area">
                  <img class="image-achievement" src="../../image/people.png">
              </div>
              <div class = "counting">3000</div>
              <p  class="achievement-title">Khách hàng</p>
            </div>
            <div class="col-4 achieve-item" data-aos="fade-down">
              <div class = "image-achievement-area">
                  <img class="image-achievement" src="../../image/year-icon.png">
              </div>
              <div class = "counting">3</div>
              <p  class="achievement-title">Năm hoạt động</p>
            </div>
            <div class="col-4 achieve-item" data-aos="fade-down">
              <div class = "image-achievement-area">
                  <img class="image-achievement" src="../../image/buy-icon.png">
              </div>
              <div class = "counting">3000</div>
              <p class="achievement-title">Lượt mua hàng</p>
            </div>
          </div>
          
        </div>
      
    </div>
    
</body>
</html>
<script><?php require("../../assests/user/js/jquery.min.js"); ?></script>
<script><?php require("../../assests/user/js/bootstrap/bootstrap.bundle.min.js");?></script>
<script><?php require("../../assests/user/js/aos/aos.js");?></script>
<script><?php require("../../assests/user/js/aos/aos.add.js");?></script>
