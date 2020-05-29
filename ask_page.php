<?php
session_start();
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
        alert("sukses tmbh tag");
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
              alert("Sukses membuat pertanyaan");
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


  <div id="container">
    <div id="header"></div>
    <div id="body">
      <!-- Jumbotron -->
      <div class="jumbotron jumbotron-fluid" style="height: 500px; background-image: url(img/jumbotron.png); background-position: center; background-size: cover;">
        <div class="container">
          <h1 class="text1" style="text-align: center; font-family: NunitoBold;">Solving your stuckness.</h1>
          <p class="text2" style="text-align: center; font-family: fontCode;">Ask and answer questions online with code
            lovers!</p>
        </div>
      </div>
    </div>

    <div id="isi">
      <div class="form-group">
        <label for="judul">Question Title :</label>
        <input type="text" class="form-control" placeholder="Ex: Inheritance in OOP" id="judul">
      </div>
      <div class="form-group">
        <label for="isi">Your Question :</label>
        <input type="text" class="form-control" id="pertanyaan" placeholder="Min:10 words">
      </div>
      <button class="btn btn-primary" onclick="addTag()">Add Tag</button>
      <button type="submit" class="btn btn-primary" id="submitData">Submit</button>
    </div>
  </div>




</body>

</html>