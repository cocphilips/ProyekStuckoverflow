<?php
require_once("connect.php");
if (isset($_POST["thisID"])) {
    $id = $_POST["thisID"];
    $query = mysqli_query($con, "DELETE FROM questions WHERE id = " . $id);
    if ($con->affected_rows > 0) {
        echo "Delete berhasil";
    }
}
