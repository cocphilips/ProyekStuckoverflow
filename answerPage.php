<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var id_question = <?php echo $_GET["id"]; ?>;
            $("#submitData").click(function() {
                var answer = $("#jawab").val();
                var id_user = <?php echo $_SESSION["id"]; ?>;

                $.ajax({
                    type: 'POST',
                    url: 'addAnswer.php',
                    datatype: "json",
                    data: {
                        answer: answer,
                        id_question: id_question,
                        id_user: id_user
                    },
                    success: function(data) {

                    }
                });

            });
            //getAllComment
            $.ajax({
                type: 'GET',
                url: 'showComment.php',
                datatype: "json",
                data: {
                    id_question: id_question
                },
                success: function(result) {
                    var data = JSON.parse(result);
                    var dataDiv = $("#comments");
                    var str = "";
                    for (var i = 0; i < data.length; i++) {
                        var d = data[i];
                        str += "<div class='content text-center' style='margin: 0 auto; background-color:salmon;'><h6>" + d.displayname + "</h6>";
                        str += "<p>" + d.waktu + "</p>";
                        str += "<p>" + d.isi + "</p></div>";
                    }
                    dataDiv.html(str);
                }
            });
        });
    </script>
</head>

<body>
    <?php
    include "navbar.php";
    ?>
    <div class="jumbotron jumbotron-fluid" style="height: 300px; background-color: #141f3d;">
        <div class="container">
            <h1 class="text1" style="text-align: center; font-family: NunitoBold;">Solving your stuckness.</h1>
            <p class="text2" style="text-align: center; font-family: fontCode;">Ask and answer questions online with code
                lovers!</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-7">
                <?php
                require_once("connect.php");
                if (isset($_GET["id"])) {
                    $id = $_GET["id"];

                    $q = mysqli_query($con, "SELECT * FROM questions WHERE id = " . intval($id));
                    $q2 = mysqli_query($con, "SELECT * FROM tags WHERE id_questions = " . intval($id));

                    if ($q->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($q)) {
                            echo "<div style='background-color:cyan; width:100%; margin:0 auto;'><h5><b>" . $row['topik'] . "</b></h5>";
                            echo "<p>" . $row["isi"] . "</p>";
                        }
                        while ($row1 = mysqli_fetch_assoc($q2)) {
                            echo "<p>" . $row1["namatag"] . "</p>";
                        }
                        echo "</h6></div>";
                    }
                } else {
                    echo "kosong";
                }
                ?>
                <div class="form-group" style=" background-color:aqua;">
                    <label for="jawab">Comment :</label>
                    <textarea class="form-control" id="jawab" rows="5" placeholder="Min 10 words"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" id="submitData">Submit</button>
            </div>
            <div class="col-5" style="height:200px; overflow-y:scroll; margin:0 auto;">
                <div id="comments">
                </div>
            </div>
        </div>
    </div>
</body>

</html>