<?php

require_once("connect.php");
if (isset($_POST["id_question"]) && isset($_POST["id_user"])) {
    $id_question = $_POST["id_question"];
    $id_user = $_POST["id_user"];
    $likes = mysqli_query($con, "SELECT likes FROM questions WHERE id='" . $id_question . "'");
    $row = $likes->fetch_assoc();
    $totalLikes = intval($row["likes"]) - 1;
    $q = mysqli_query($con, "SELECT * FROM likes WHERE id_questions='" . $id_question . "' AND id_users='" . $id_user . "'");
    if ($q->num_rows > 0) {
        $deleteQ = mysqli_query($con, "DELETE FROM likes WHERE id_questions='" . $id_question . "' AND id_users='" . $id_user . "'");
        $refreshLike = mysqli_query($con, "UPDATE questions SET likes = '" . intval($totalLikes) . "' WHERE id='" . intval($id_question) . "'");
    }
} else {
    echo "gagal";
}
