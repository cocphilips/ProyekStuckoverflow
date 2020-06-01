<?php

require_once("connect.php");
if (isset($_POST["id_question"]) && isset($_POST["id_user"]) && isset($_POST["idAnswer"])) {
    $id_question = $_POST["id_question"];
    $id_answer = $_POST["idAnswer"];
    $id_user = $_POST["id_user"];
    $valid = mysqli_query($con, "SELECT * FROM questions WHERE id='" . $id_question . "' AND id_users='" . $id_user . "'");
    $row = $valid->fetch_assoc();
    if ($row["valid"] == 0) {
        $refreshLike = mysqli_query($con, "UPDATE questions SET valid = '" . $id_answer . "' WHERE id='" . intval($id_question) . "'");
    }
} else {
    echo "gagal";
}
