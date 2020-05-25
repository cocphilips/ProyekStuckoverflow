<?php
session_start();
if(isset($_SESSION["login"])){
  header("Location: home.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>

  <script type="text/javascript">
    $(document).ready(function () {
      $("#signupButton").click(function () {
        var name = $("#s_disname").val();
        var email = $("#s_email").val();
        var password = $("#s_password").val();
        $.ajax({
          type: 'POST',
          url: 'signup.php',
          datatype: "json",
          data: {
            name: name,
            email: email,
            password: password
          },
          success: function (data) {
            alert(data);
          }
        })
      });


      $("#loginButton").click(function () {
        var email = $("#l_email").val();
        var password = $("#l_password").val();
        $.ajax({
          type: 'POST',
          url: 'login.php',
          datatype: "json",
          data: {
            email: email,
            password: password
          },
          success: function (data) {
            alert(data);
            window.location.href = "home.php";
          }
        })
      });
    });


    function loginPopup() {
      $('#loginModal').modal('show');
    }

    function signupPopup() {
      $('#signupModal').modal('show');
    }
  </script>

  <title>Unstuck your life!</title>
</head>

<body>

  <!-- loginModal -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" style="font-family: NunitoLight;" id="exampleModalLabel">Login</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label style="font-family: NunitoLight;">Email : </label>
          <input type="email" name="email" id="l_email" placeholder="Masukkan email anda.."
            style="width: 100%; padding: 10px; font-family: NunitoLight;">
          <label style="margin-top: 10px; font-family: NunitoLight;">Password : </label>
          <input type="password" name="password" id="l_password" placeholder="Masukkan password anda.."
            style="width: 100%; padding: 10px; font-family: NunitoLight;">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" id="loginButton"
            style="color: white; background-color: #141f3d;">Login</button>
        </div>
      </div>
    </div>
  </div>

  <!-- signupModal -->
  <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label style="font-family: NunitoLight;">Display Name : </label>
          <input type="text" name="displayname" id="s_disname" placeholder="Masukkan display name anda.."
            style="width: 100%; padding: 10px; font-family: NunitoLight;">
          <label style="margin-top: 10px; font-family: NunitoLight;">Email : </label>
          <input type="email" name="email" id="s_email" placeholder="Masukkan email anda.."
            style="width: 100%; padding: 10px; font-family: NunitoLight;">
          <label style="margin-top: 10px; font-family: NunitoLight;">Password : </label>
          <input type="password" name="password" id="s_password" placeholder="Masukkan password anda.."
            style="width: 100%; padding: 10px; font-family: NunitoLight;">
          <div class="modal-footer">
            <button type="button" class="btn" id="signupButton" style="color: white; background-color: #141f3d;">Sign
              Up</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="padding-left: 20px;">
      <a class="navbar-brand">
        <img src="img/logo.png" width="30%" height="30%">
      </a>
      <ul class="navbar-nav ml-auto mr-5">
        <li class="nav-item mr-3">
          <a class="nav-link" onclick="loginPopup()" style="cursor: pointer;">Login</a>
        </li>
        <li class="nav-item mr-3">
          <a class="nav-link" onclick="signupPopup()" style="cursor: pointer;">Signup</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="cursor: pointer;" href="aboutus.html">About Us </a>
        </li>
      </ul>
    </div>
  </nav>

  <div id="container">
    <div id="header"></div>
    <div id="body">
      <!-- Jumbotron -->
      <div class="jumbotron jumbotron-fluid"
        style="height: 500px; background-image: url(img/jumbotron.png); background-position: center; background-size: cover;">
        <div class="container">
          <h1 class="text1" style="text-align: center; font-family: NunitoBold;">Solving your stuckness.</h1>
          <p class="text2" style="text-align: center; font-family: fontCode;">Ask and answer questions online with code
            lovers!</p>
        </div>
      </div>

      <!-- Cards -->
      <div class="card-deck" style="margin:0 auto;">
        <div class="card text-center" style="border: 2px solid #141f3d;">
          <div class="card-body">
            <h4 class="card-title" style="font-family: NunitoBold;">Ask anything that make your life stuck</h4>
            <img src="img/qna.png" class="card-img-top">
            <p class="card-text" style="font-family: fontCode; text-align: justify;">Wondering what is the solution of
              your coding problem? You
              can ask to everyone here who
              loves coding!</p>
            <a href="home.php" class="btn" style="background-color: #141f3d; color: white;">Ask Questions</a>
          </div>
        </div>
        <div class="card text-center" style="border: 2px solid #141f3d;">
          <div class="card-body">
            <h2 class="card-title" style="font-family: NunitoBold;">Stuckoverflow</h2>
            <img src="img/mid.png" class="card-img-top">
            <p class=" card-text" style="font-family: fontCode; font-size: 18px; text-align: justify;">This is a place
              to
              relieve your mind
              from being stuck and
              a place for everyone to grow! Just tell us what is the problem and we can work out together. Don't worry
              you
              won't be judged by the others :)
            </p>
          </div>
        </div>
        <div class="card text-center" style="border: 2px solid #141f3d;">
          <div class="card-body">
            <h4 class="card-title" style="font-family: NunitoBold;">Be someone else's superhero</h4>
            <img src="img/superhero.png" class="card-img-top" style="width: 50%;">
            <p class="card-text" style="font-family: fontCode; text-align: justify; margin-top: 20px;">Is your dream to
              be
              a superhero?
              Well, here is your chance
              to realize it. Give solutions
              to them who needs help.</p>
            <a href="home.php" class="btn" style="background-color: #141f3d; color: white;">Answer Questions</a>
          </div>
        </div>
      </div>
    </div>
    <div id="footer">
      <p style="color: white; font-family: fontCode; text-align: center; padding-top: 20px;">Copyright ©2020
        Stuckoverflow</p>
    </div>
  </div>
</body>

</html>