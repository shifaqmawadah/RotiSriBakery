<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Roti Sri Bakery - Landing Page</title>
  <?php 
    require "header.php"; 
    require_once "includes/class_autoloader.php";

    // database initialization
    $dbinit = new InitDB();
    $dbinit->initDbExec();
  ?>
</head>
<body>
  <div class="slider" style="width: 60%; margin: auto;">
    <ul class="slides">
      <li>
        <img src="./static/images/poster6.jpg">
        <div class="caption center-align">
          <h3></h3>
          <h5 class="white-text center bold hoverable">Baked with love and sprinkled with happiness.</h5>
          </div>
      </li>
      <li>
      <img src="./static/images/poster1.jpg"> 
        <div class="caption center-align">
          <h3 class="bold page-title">At Roti Sri Bakery</h3>
          <h5 class="bold page-title">Happiness is the smell of freshly baked bread.</h5>
        </div>
      </li>
      <li>
<img src="./static/images/poster5.jpg">
<div class="caption center-align">
<h3 class="bold green-text page-title">Sweeten your day, one pastry at a time</h3>
</div>
      </li>
      <li>
<img src="./static/images/poster2.jpg">
<div class="caption center-align">
</div>
      </li>
    </ul>
  </div>
<div class="container" style="margin-top: 100px">
<div class="row">
<div class="row" style="margin-top: 50px;">
<div class="col hoverable">
<a href="product_catalogue.php?category=0" class="hoverable">
<div class="selectable-card hoverable" style="width: 300px; margin: 50px auto;">
<img class="hoverable" src="static/images/bun pastries.png" />
<h5 class="white-text center bold hoverable">Buns</h5>
</div>
</a>
</div>
<div class="col hoverable">
<a href="product_catalogue.php?category=1" class="hoverable">
<div class="selectable-card hoverable" style="width: 300px; margin: 50px auto;">
<img class="hoverable" src="static/images/dessertcake.jpg" />
<h5 class="white-text center bold hoverable">Cakes</h5>
</div>
</a>
</div>
</div>
<div class="section" style="margin-top: 100px;">
<div class="wide-container">
<h3 class="white-text center">Baked by Professional Chefs</h3>
<h5 class="white-text center">
At <b class="orange-text">Roti Sri Bakery</b>, we are a team of passionate bakers and dessert
enthusiasts dedicated to creating delightful, handcrafted treats and unforgettable flavors.
</h5>
</div>
</div>
<div class="grid" style="margin-top: 20px; margin-bottom: 100px">
<div class="grid">
<h1 class="count red-text text-darken-4 bold center">5</h1>
<h5 class="white-text center">Years Of History</h5>
</div>
<div class="grid">
<h1 class="count red-text text-darken-4 bold center">7</h1>
<h5 class="white-text center">Branches Built</h5>
</div>
<div class="grid">
<h1 class="count red-text text-darken-4 bold center">7</h1>
<h5 class="white-text center">States Covered</h5>
</div>
<div class="grid">
<h1 class="count red-text text-darken-4 bold center">100</h1>
<h5 class="white-text center">% Satisfaction guaranteed</h5>
</div>
</div>
<h3 class="white-text center">The Making of Cinnamon Rolls</h3>
<div onclick="this.nextElementSibling.style.display='block'; this.style.display='none'" style="marginbottom: 100px">
<img src="static/images/video1.jpg" style="cursor:pointer; display:block; margin: 0 auto; " />
</div>
<div style="display:none">
<video style="display:block; margin: 0 auto;" class="responsive-video" width="1280" height="720"
autoplay="autoplay" controls muted>
<source src="static/cinnamonvideo.mp4" type="video/mp4">
</video>
</div>
<h3 class="white-text center">OUR DIFFERENCE</h3>
<h6 class="white-text center">Compared to other Bakery</h6>
<div class="grid" style="margin-bottom: 0px;">
<div class="grid">
<div class="rounded-card-parent">
<div class="card rounded-card tint-glass-black" style="height: 300px; width: 250px;">
<img src="static/images/values_images/jakim.svg" height="200px">
<div class="row center">
<h5 class="orange-text bold center" style="display: inline;">H</h5>
<h5 class="white-text bold center" style="display: inline;">alal Certificate</h5>
</div>
</div>
</div>
</div>
<div class="grid">
<div class="rounded-card-parent">
<div class="card rounded-card tint-glass-black" style="height: 300px; width: 250px;">
<img src="static/images/values_images/T.svg" height="200px">
<div class="row center">
<h5 class="orange-text bold center" style="display: inline;">G</h5>
<h5 class="white-text bold center" style="display: inline;">uaranteed Satisfaction</h5>
</div>
</div>
</div>
</div>
<div class="grid">
<div class="rounded-card-parent">
<div class="card rounded-card tint-glass-black" style="height: 300px; width: 250px;">
<img src="static/images/values_images/E.svg" height="200px">
<div class="row center">
<h5 class="orange-text bold center" style="display: inline;">T</h5>
<h5 class="white-text bold center" style="display: inline;">echnical Support</h5>
</div>
</div>
</div>
</div>
<div class="grid">
<div class="rounded-card-parent">
<div class="card rounded-card tint-glass-black" style="height: 300px; width: 250px;">
<img src="static/images/values_images/Rebate.png" height="200px">
<div class="row center">
<h5 class="orange-text bold center" style="display: inline;">M</h5>
<h5 class="white-text bold center" style="display: inline;">onthly Promotions</h5>
</div>
</div>
</div>
</div>
<div class="grid">
<div class="rounded-card-parent">
<div class="card rounded-card tint-glass-black" style="height: 300px; width: 250px;">
<img src="static/images/values_images/S.svg" height="200px">
<div class="row center">
<h5 class="orange-text bold center" style="display: inline;">C</h5>
<h5 class="white-text bold center" style="display: inline;">onfirm trusted delivery
services</h5>
</div>
</div>
</div>
</div>
<div class="grid">
<div class="rounded-card-parent">
<div class="card rounded-card tint-glass-black" style="height: 300px; width: 250px;">
<img src="static/images/values_images/H.png" height="200px">
<div class="row center">
<h5 class="orange-text bold center" style="display: inline;">H</h5>
<h5 class="white-text bold center" style="display: inline;">ighly Professional</h5>
</div>
</div>
</div>
</div>
</div>
<script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-dcc4934e-3eb0-4e18-98af-67fd2f034df1"></div>

<?php require "footer.php"; ?>
</body>

<script>
  $(document).ready(function(){
    // carousel autoswipe
    $('.slider').slider({full_width: true});

    // counter
    $('.count').each(function () 
    {
      $(this).prop('Counter',0).animate({
        Counter: $(this).text()
      }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) { $(this).text(Math.ceil(now)); }
      });
    });
  });
</script>
</html>