<?php
session_start();
// if(isset($_SESSION["login"])){
//   header("Location: home.php");
//   exit;
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
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
  </script>

  <title>Explore Questions!</title>
</head>

<body>

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

  <?php include "navbar.php"; ?>

  <div id="container-fluid" style="min-height: 100%;">
    <div class="row">
      <div class="col-sm-12 col-md-6 offset-md-3 mt-md-5">
        <form id="searchBarForm">
          <h5>Search by name,tags, anything.</h5>
          <div class="input-group">
            <input type="text" id="question_query" class="form-control">
            <span class="input-group-btn">
              <button class="btn btn-primary btn-md" onclick="search(0)">Search</button>
            </span>
          </div><!-- /input-group -->


        </form>
      </div>
    </div>
    <div id="searchResult">
      <div class="row" style="margin-bottom: 40%;">

      </div>
    </div>

  </div>
  <?php include "footer.php"; ?>

</body>

<script type="text/javascript">
  //SearchBar Jquery
  $("#searchBarForm").submit(function(e) {
    e.preventDefault();
  });
  $("#question_query").on('keyup', function(e) {
    if (e.keyCode === 13) {
      search(0);
    }

  });

  function searchTrigger() {

    console.log("Enter triggered from search bar");
    var query = $("#question_query").val();
    console.log("The query:" + query);
    $.ajax({
      type: "POST",
      url: "searchApp.php",
      data: {
        requestType: "searchUser",
        query: query
      },
      success: function(data) {
        console.log(data);
        $("#searchResult").html(data);
      }
    });

  }

  function search(page) {
    var query = $("#question_query").val();
    console.log("The query:" + query);
    $.ajax({
      type: "POST",
      url: "searchApp.php",
      data: {
        requestType: "search_by_word",
        query: query,
        page: page
      },
      success: function(data) {
        console.log(data);
        $("#searchResult").html(data);
      }
    });
  }
</script>

</html>