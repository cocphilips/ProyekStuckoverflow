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

  <script type="text/javascript">
    $(document).ready(function() {

      $("#showQuestion").click(function() {
        window.location.href = "showMyQuestionPage.php";
      });

      $("#signupButton").click(function() {
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
          success: function(data) {
            alert(data);
          }
        })
      });


      $("#loginButton").click(function() {
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
          success: function(data) {
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

    function seeQuestion(id) {
      var thisID = id;
      <?php
      if (!isset($_SESSION["login"])) {
      ?>
        $('#loginModal').modal('show');
      <?php
      } else {
      ?>
        window.location.href = "answerPage.php?id=" + thisID;
      <?php
      }
      ?>
    }
  </script>

  <title>Unstuck your life!</title>
</head>

<body>
  <?php
  include "navbar.php";
  ?>
  <!-- loginModal -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <input type="email" name="email" id="l_email" placeholder="Masukkan email anda.." style="width: 100%; padding: 10px; font-family: NunitoLight;">
          <label style="margin-top: 10px; font-family: NunitoLight;">Password : </label>
          <input type="password" name="password" id="l_password" placeholder="Masukkan password anda.." style="width: 100%; padding: 10px; font-family: NunitoLight;">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" id="loginButton" style="color: white; background-color: #141f3d;">Login</button>
        </div>
      </div>
    </div>
  </div>

  <!-- signupModal -->
  <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <input type="text" name="displayname" id="s_disname" placeholder="Masukkan display name anda.." style="width: 100%; padding: 10px; font-family: NunitoLight;">
          <label style="margin-top: 10px; font-family: NunitoLight;">Email : </label>
          <input type="email" name="email" id="s_email" placeholder="Masukkan email anda.." style="width: 100%; padding: 10px; font-family: NunitoLight;">
          <label style="margin-top: 10px; font-family: NunitoLight;">Password : </label>
          <input type="password" name="password" id="s_password" placeholder="Masukkan password anda.." style="width: 100%; padding: 10px; font-family: NunitoLight;">
          <div class="modal-footer">
            <button type="button" class="btn" id="signupButton" style="color: white; background-color: #141f3d;">Sign
              Up</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Jumbotron -->
  <div class=" jumbotron jumbotron-fluid" id="banner" style="background-color: #141f3d; background-image:url(img/home.png);">
    <div class="container">
      <h1 class="text3">See others stuckness as well.</h1>
      <p class="text2" style="text-align: left;">Learn and grow together</p>
      <?php
      if (isset($_SESSION["login"])) {
        echo '<button class="btn btn-danger" style="font-family:NunitoLight;" id="showQuestion">Show My Question</button>';
      }
      ?>
    </div>
  </div>

  <!-- listQuestion -->
  <div class="container-fluid" id="questions" style="margin-bottom: 20px; min-height: 100%;">
    <?php
    require_once("connect.php");

    $q = mysqli_query($con, "SELECT * FROM questions ORDER BY likes DESC LIMIT 10");
    if (!empty($q)) {
      while ($row = mysqli_fetch_assoc($q)) {
        echo "<div class='card text-center' style='width:60%; margin: 0 auto; margin-top: 20px;'>";
        echo "<div class='card-header'><h5 id='judultopik' style='cursor:pointer;font-family: NunitoLight; text-align:left; 
        margin-top:15px; margin-left:15px;' onclick='seeQuestion(\"" . $row['id'] . "\")'><b>" . "Topik : " . $row['topik'] . "</b></h5></div>";
        echo "<div class='card-body'>";
        $words = explode(" ", $row['isi']);
        echo "<p id='isitopik'>";
        for ($i = 0; $i < 10; $i++) {
          echo $words[$i] . " ";
        }
        echo "</p></div>";
        $q2 = mysqli_query($con, "SELECT displayname FROM users WHERE id = '" . $row['id_users'] . "'");
        $row2 = mysqli_fetch_assoc($q2);
        echo "<div class='card-footer text-muted'>";
        echo "<img id='like' src='img/like.png'>";
        echo "<span id='totallike'>" . $row['likes'] . "</span>";
        echo "<img id='answer' src='img/answers.png'>";
        echo "<span id='totalanswer'>" . $row['answerscount'] . "</span>";
        echo "<p id='akhirtopik'>
        Asked by : <b>" . $row2['displayname'] . "</b>&nbsp" . $row['waktu'] . "</div></div>";
      }
    }

    ?>
  </div>
  <?php include "footer.php"; ?>

</body>

</html>