<?php

require_once("connect.php");
if (isset($_POST["id_question"]) && isset($_POST["id_user"])) {
    $id_question = $_POST["id_question"];
    $id_user = $_POST["id_user"];
    $likes = mysqli_query($con, "SELECT likes FROM questions WHERE id='" . $id_question . "'");
    $row = $likes->fetch_assoc();
    $totalLikes = intval($row["likes"]) + 1;
    $q = mysqli_query($con, "SELECT * FROM likes WHERE id_questions='" . $id_question . "' AND id_users='" . $id_user . "'");
    if ($q->num_rows == 0) {
        $insertQ = mysqli_query($con, "INSERT INTO likes (id, id_questions, id_users) VALUES (0, '" . $id_question . "', '" . $id_user . "')");
        $refreshLike = mysqli_query($con, "UPDATE questions SET likes = '" . intval($totalLikes) . "' WHERE id='" . intval($id_question) . "'");
    } else {
        echo "gagal query";
    }
} else {
    echo "gagal";
}
