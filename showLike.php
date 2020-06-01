<?php
require_once("connect.php");
if (isset($_GET["id_question"])) {
    $id_question = $_GET["id_question"];
    $query = mysqli_query($con, "SELECT likes FROM questions WHERE id='" . $id_question . "'");
    $arr = [];
    while ($res = mysqli_fetch_assoc($query)) {
        array_push($arr, $res);
    }
    echo json_encode($arr);
}
