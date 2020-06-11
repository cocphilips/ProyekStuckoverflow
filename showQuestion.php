<?php
require_once("connect.php");

if (isset($_POST["id_user"])) {
	$id_user = $_POST["id_user"];
	$query = mysqli_query($con, "SELECT questions.id, questions.topik, questions.isi, questions.likes, 
    questions.waktu, questions.answerscount, users.displayname
    FROM questions INNER JOIN users ON questions.id_users = users.id WHERE questions.id_users = '" . $id_user . "'");

    $arr = [];
    
    if($query){
        while ($res = mysqli_fetch_assoc($query)) {
            array_push($arr, $res);
        }
        echo json_encode($arr);
    }
    else{
        echo "ERROR";
    }
	
	
}
else{
    echo "Error";
}
?>
