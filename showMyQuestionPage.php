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
    function seeQuestion(id) {
      var thisID = id;
      window.location.href = "answerPage.php?id=" + thisID;
    }

    function deleteQuestion(id) {
      var thisID = id;
      $.ajax({
        type: 'POST',
        url: 'deleteQuestion.php',
        datatype: "json",
        data: {
          thisID: thisID
        },
        success: function(result) {
          alert(result);
          window.location.href = "showMyQuestionPage.php";
        }
      });
    }
  </script>
</head>

<body>
  <?php
  include "navbar.php";
  ?>

  <!-- Jumbotron -->
  <div class=" jumbotron jumbotron-fluid" id="banner" style="background-color: #141f3d; background-image:url(img/home.png);">
    <div class="container">
      <h1 class="text4">These have been your unsolved problems</h1>
      <p class="text2" style="text-align: left;">Learn and grow together</p>
    </div>
  </div>
  <div class="container-fluid" id="questions" style="margin-bottom: 20px;">
    <?php
    require_once("connect.php");

    $q = mysqli_query($con, "SELECT * FROM questions WHERE id_users = " . $_SESSION['id']);
    if (!empty($q)) {
      while ($row = mysqli_fetch_assoc($q)) {
        echo "<div class='card text-center' style='width:60%; margin: 0 auto; margin-top: 20px;'>";
        echo "<div class='card-header'><h5 id='judultopik' style='cursor:pointer;font-family: NunitoLight; text-align:left; 
        margin-top:15px; margin-left:15px;' onclick='seeQuestion(\"" . $row['id'] . "\")'><b>" . "Topik : " . $row['topik'] . "</b></h5>";
        echo "<svg class='bi bi-archive-fill' onclick='deleteQuestion(\"" . $row['id'] . "\")' style='float: right; margin-top: -30px; cursor:pointer;' width='1em' height='1em' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
        <path fill-rule='evenodd' d='M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM6 7a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1H6zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z'/>
        </svg></div>";
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