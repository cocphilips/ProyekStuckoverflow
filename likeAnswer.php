<?php
session_start();
require_once("connect.php");

if (!empty($_POST["idAnswer"])) {
    $id_answers = $_POST["idAnswer"];
    $id_user = $_SESSION["id"];
    $q = mysqli_query($con, "SELECT * FROM likes_answer WHERE id_answers='" . $id_answers . "' AND id_users='5'");
    // echo $q;

    $arr = [];
    $res = mysqli_num_rows($q);
    array_push($arr, $q);
    echo json_encode($arr);
}
