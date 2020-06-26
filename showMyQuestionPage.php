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
          alert("Delete sukses!");
          showQuestion();
        }
      });
    }

    function showQuestion() {
      var id_user = <?php echo $_SESSION["id"]; ?>;
      $.ajax({
        type: 'POST',
        url: 'showQuestion.php',
        datatype: "json",
        data: {
          id_user: id_user
        },
        success: function(result) {
          var data = JSON.parse(result);
          var dataDiv = $("#pertanyaan");
          var str = "";
          if(data.length <= 0){
            str += "<h3 style='margin: 0 auto; font-family: NunitoLight; text-align: center;'>oops! It seems like you have not asked anything yet</h3>";
          }
          else {
              for (var i = 0; i < data.length; i++) {
              var d = data[i];
              str += "<div class='card text-center' style='width:60%; margin: 0 auto; margin-top: 20px;'>";
              str += "<div class='card-header'><h5 id='judultopik' style='cursor:pointer;font-family: NunitoLight; text-align:left; margin-top:15px; margin-left:15px;' onclick='seeQuestion(\"" + d.id + "\")'><b>Topik : " + d.topik + "</b></h5>";
              str += "<svg class='bi bi-archive-fill' onclick='deleteQuestion(\"" + d.id + "\")' style='float: right; margin-top: -30px; cursor:pointer;' width='1em' height='1em' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM6 7a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1H6zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z'/></svg></div>";
              str += "<div class='card-body'>";
              str += "<textarea style=' width: 100%; font-family: fontCode; margin-top: 10px; border:none;' readonly rows='2'>";
              var kata = d.isi;
              var hasil = kata.split(" ");
              for (var j = 0; j < 10; j++) {
                str += hasil[j];
                str += " ";
              }
              str += "</textarea></div>";
              str += "<div class='card-footer text-muted'>";
              str += "<img id='like' src='img/like.png'>";
              str += "<span id='totallike'>" + d.likes + "</span>";
              str += "<img id='answer' src='img/answers.png'>";
              str += "<span id='totalanswer'>" + d.answerscount + "</span>";
              str += "<p id='akhirtopik'> Asked by : <b>" + d.displayname + "</b>&nbsp" + d.waktu + "</div></div>";
            }
          }
          dataDiv.html(str);
        }
      });
    }

    $(document).ready(function() {
      showQuestion();
    });
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
  <div class="container-fluid" id="questions" style="margin-bottom: 20px; min-height: 100%;">
    <div id="pertanyaan">

    </div>
  </div>
  <?php include "footer.php"; ?>

</body>

</html>