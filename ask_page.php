<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: landingPage.php");
  exit;
}
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


  <title>Unstuck your life!</title>

  <script type="text/javascript">
    $(document).ready(function() {
      var tag;
      $("#tagButton").click(function() {
        tag = $("#tagName").val();
        alert("Sukses menambahkan tag");
        $("#tagModal").modal('hide');
      });

      $("#submitData").click(function() {
        var title = $("#judul").val();
        var isi = $("#pertanyaan").val();

        if (isi.split(" ").length >= 10) {
          $.ajax({
            type: 'POST',
            url: 'addQuestion.php',
            datatype: "json",
            data: {
              title: title,
              isi: isi,
              tag: tag
            },
            success: function(data) {
              alert(data);
              window.location.href = "home.php";
            }
          });
        } else {
          alert("Isi pertanyaan tidak mencapai minimum");
        }

      });
    }); //document ready ends

    function addTag() {
      $("#tagModal").modal('show');
    }
  </script>
</head>

<body>
  <?php include "navbar.php"; ?>


  <!-- modal tag -->
  <div class="modal fade" id="tagModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" style="font-family: NunitoLight;" id="exampleModalLabel">Tags</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label style="font-family: NunitoLight;">Your tag name :</label>
          <input type="text" name="tag" id="tagName" placeholder="Ex: Java,Class,String" style="width: 100%; padding: 10px; font-family: NunitoLight;">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" id="tagButton" style="color: white; background-color: #141f3d;">Add Tag</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid" style="height: 300px; background-color:#141f3d;">
    <div class="container">
      <h1 class="text5">Time to tell your stuckness</h1>
      <p class="text2" style="text-align: center; font-family: fontCode;">Our community ready to help you!</p>
    </div>
  </div>

  <div class="container-bwh" style=" width: 80%; margin:0 auto;">
    <div class="row">
      <div class="col-lg-8">
        <h1 style="font-family: NunitoLight; font-weight:800;">Ask your question</h1>
        <div class="form-group">
          <label for="judul" style="font-family: NunitoLight;">Question Title :</label>
          <input type="text" style="font-family: fontCode;" class="form-control" placeholder="Ex: Inheritance in OOP" id="judul">
        </div>
        <div class="form-group">
          <label for="isi" style="font-family: NunitoLight;">Your Question :</label>
          <textarea class="form-control" style="font-family: fontCode;" id="pertanyaan" rows="5" placeholder="Min 10 words"></textarea>
        </div>
        <button class="btn" onclick="addTag()" style="font-family: NunitoLight; color: white; background-color: #141f3d;">Add Tag</button>
        <button type="submit" class="btn" id="submitData" style="font-family: NunitoLight; color: white; background-color: #141f3d;">Submit</button>
      </div>
      <div class="col-lg-4" style="float:right; margin-top:30px;">
        <div id="accordion">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link" style="font-family: NunitoLight;" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Step 1 : Summarize the problem
                </button>
              </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body" style="font-family: fontCode;">
                <p>Describe your goal and expectation</p>
                <p>Describe the problem or error</p>
                <p>Include any error message</p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" style="font-family: NunitoLight;" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Step 2 : Describe what you've tried
                </button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="card-body" style="font-family: fontCode;">
                <p>Show what you've tried and why it didn't meet your expectations</p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingThree">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" style="font-family: NunitoLight;" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Step 3 : Show some code
                </button>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="card-body" style="font-family: fontCode;">
                <p>Share some of your code that others need to reproduce</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>




  <?php include "footer.php"; ?>

</body>

</html>