<?php
require_once("connect.php");
if (isset($_GET["idAnswer"])) {
    $idAnswer = $_GET["idAnswer"];
    $query = mysqli_query($con, "SELECT likes FROM answers WHERE id='" . $idAnswer . "'");
    $arr = [];
    while ($res = mysqli_fetch_assoc($query)) {
        array_push($arr, $res);
    }
    echo json_encode($arr);
}
