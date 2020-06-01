<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: home.php");
    exit;
}
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
                        str += "<div class='content text-center' style='background-color:salmon;'><h6>" + d.displayname + "</h6>";
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
    <div class="jumbotron jumbotron-fluid" style="height: 300px; background-color: #141f3d;
    background-image:url(img/task.png); background-size:contain; background-position: center; background-repeat:no-repeat;">
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
                            $q3 = mysqli_query($con, "SELECT displayname FROM users WHERE id = '" . $row['id_users'] . "'");
                            $row3 = mysqli_fetch_assoc($q3);
                            echo "<div><h5 style='margin-bottom: 10px;font-family: NunitoLight; font-size: 24px;'><b>" . $row['topik'] . "</b></h5>";
                            echo "<p style='font-family: fontCode; font-size:14px;'> Asked by " . $row3["displayname"] . "</p>";
                            echo "<p style='font-family: fontCode;'>" . $row["isi"] . "</p>";
                        }
                        while ($row2 = mysqli_fetch_assoc($q2)) {
                            echo "<div style='width:50%;'><p style='cursor:pointer;font-size: 12px; margin-bottom: 5px;font-family: fontCode;'>" . $row2["namatag"] . "</p></div>";
                        }
                        echo "</div>";
                    }
                } else {
                    echo "kosong";
                }
                ?>
                <div class="form-group" style="margin-top: 30px;">
                    <label style='font-family: NunitoLight;' for="jawab">Comment :</label>
                    <textarea style='font-family: fontCode;' class="form-control" id="jawab" rows="5" placeholder="Min 10 words"></textarea>
                </div>
                <button type="submit" class="btn" id="submitData" style="color: white; background-color: #141f3d;">Submit</button>
            </div>
            <div class="col-5" style="height:200px; overflow-y:scroll; margin:0 auto;">
                <div id="comments">
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>