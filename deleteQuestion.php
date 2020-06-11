<?php
require_once("connect.php");
if (isset($_POST["thisID"])) {
    $id = $_POST["thisID"];
    $query = mysqli_query($con, "DELETE FROM questions WHERE id = " . $id);
    $query2 = mysqli_query($con, "DELETE FROM tags WHERE id_questions = " . $id);
    $query3 = mysqli_query($con, "DELETE FROM likes WHERE id_questions = " . $id);
    $query4 = mysqli_query($con, "DELETE FROM answers WHERE id_questions = " . $id);
    $query5 = mysqli_query($con, "DELETE FROM likes_answers JOIN answers ON likes_answers.id_answers = 
    answers.id WHERE answers.id_questions = " . $id);

    if ($con->affected_rows > 0) {
        echo "Delete berhasil";
    }
}
