<?php

require_once("connect.php");
if (isset($_POST["idAnswer"]) && isset($_POST["id_user"])) {
    $idAnswer = $_POST["idAnswer"];
    $id_user = $_POST["id_user"];
    $likes = mysqli_query($con, "SELECT likes FROM answers WHERE id='" . $idAnswer . "'");
    $row = $likes->fetch_assoc();
    $totalLikes = intval($row["likes"]) - 1;
    $q = mysqli_query($con, "SELECT * FROM likes_answer WHERE id_answers='" . $idAnswer . "' AND id_users='" . $id_user . "'");
    if ($q->num_rows > 0) {
        $deleteQ = mysqli_query($con, "DELETE FROM likes_answer WHERE id_answers='" . $idAnswer . "' AND id_users='" . $id_user . "'");
        $refreshLike = mysqli_query($con, "UPDATE answers SET likes = '" . intval($totalLikes) . "' WHERE id='" . intval($idAnswer) . "'");
    }
} else {
    echo "gagal";
}
