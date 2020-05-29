<?php
session_start();
include "connect.php";
if(isset($_POST["searchQuery"])){
	$qry = $conn->real_escape_string($_POST["searchQuery"]);
	echo $qry;
}else{
	header("Location: home.php");
}
?>