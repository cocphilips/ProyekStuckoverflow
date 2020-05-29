<?php

require_once("connect.php");
if (isset($_POST["answer"]) && isset($_POST["id_question"]) && isset($_POST["id_user"])) {
    $answer = $_POST["answer"];
    $id_question = $_POST["id_question"];
    $id_user = $_POST["id_user"];

    $q1 = mysqli_query($con, "INSERT INTO answers (id, isi, id_penjawab, id_questions) VALUES (0, '" . $answer . "', '" . $id_user . "' , '" . $id_question . "')");
} else {
    echo "gagal";
}
