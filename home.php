<?php        
    session_start();
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
  <?php 
  include "navbar.php";
  ?>
  <!-- loginModal -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label>Email : </label>
          <input type="email" name="email" id="l_email" placeholder="Masukkan email anda.."
            style="width: 100%; padding: 10px;">
          <label>Password : </label>
          <input type="password" name="password" id="l_password" placeholder="Masukkan password anda.."
            style="width: 100%; padding: 10px;">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="loginButton">Login</button>
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
          <label>Display Name : </label>
          <input type="text" name="displayname" id="s_disname" placeholder="Masukkan display name anda.."
            style="width: 100%; padding: 10px;">
          <label>Email : </label>
          <input type="email" name="email" id="s_email" placeholder="Masukkan email anda.."
            style="width: 100%; padding: 10px;">
          <label>Password : </label>
          <input type="password" name="password" id="s_password" placeholder="Masukkan password anda.."
            style="width: 100%; padding: 10px;">
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="signupButton">Sign Up</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="jumbotron jumbotron-fluid"
        style="height: 500px; background-image: url(img/jumbotron.png); background-position: center; background-size: cover;">
        <div class="container">
          <h1 class="text1" style="text-align: center; font-family: NunitoBold;">Solving your stuckness.</h1>
          <p class="text2" style="text-align: center; font-family: fontCode;">Ask and answer questions online with code
            lovers!</p>
        </div>
      </div>
  <div class="questions text-center" id="questions">
    <?php
      require_once("connect.php");

      $q = mysqli_query($con, "SELECT * FROM questions ORDER BY likes DESC LIMIT 10");
      if(!empty($q)){
        while($row=mysqli_fetch_assoc($q)){
          echo "<div style='background-color:cyan; width:50%; margin:0 auto;' id='".$row['id']."'><h5><b>".$row['topik']."</b></h5>";
          $words = explode(" ", $row['isi']);
          echo "<p>";
          if(count($words)>3){
            for($i=0;$i<3;$i++){
              echo $words[$i]. " ";
            }
          }
          else {
            echo "<p>".$row['isi'];
          }
          echo "</p></div>";
        }

      }
      
    ?>
  </div>

 
      
    <!-- <?php include "footer.php"; ?> -->

</body>
</html>