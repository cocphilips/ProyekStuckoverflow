<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  </head>

<body>
  <?php
  include "navbar.php";
  ?>

  <!-- Jumbotron -->
  <div class=" jumbotron jumbotron-fluid" id="banner" style="background-color: #141f3d; background-image:url(img/home.png);">
    <div class="container">
      <h1 class="text4">Get closer to the creators!</h1>
      <p class="text2" style="text-align: left;">We are still single :p </p>
    </div>
  </div>
  
  <div class="container">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" style="height: 900px; width:100%; border-radius:200px;">
    <div class="carousel-item active">
      <img src="img/vincent.jpg" class="d-block w-100" height="900px">
      <div class="carousel-caption d-none d-md-block">
        <h5>Vincent Ie P. - C14180020</h5>
        <p>Bug hunter also creator.</p>
        <a href="https://www.instagram.com/vinvincent822/"><img id='ig' src='img/instagram.png' width="30" height="30"></a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/andrew.jpg" class="d-block w-100" height="900px">
      <div class="carousel-caption d-none d-md-block">
        <h5>Andrew Firman S. - C14180029</h5>
        <p>Silent worker.</p>
        <a href="https://www.instagram.com/andrewfirmansap/"><img id='ig' src='img/instagram.png' width="30" height="30"></a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/philip.jpg" class="d-block w-100" height="900px">
      <div class="carousel-caption d-none d-md-block">
        <h5>Philips Nogo R. - C14180040</h5>
        <p>Stylist.</p>
        <a href="https://www.instagram.com/philips_nr/"><img id='ig' src='img/instagram.png' width="30" height="30"></a>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
  <?php include "footer.php"; ?>

</body>

</html>