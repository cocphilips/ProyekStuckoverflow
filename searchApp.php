<?php
session_start();
if(isset($_POST["searchQuery"])){
	echo "Masok";
}else{
	header("Location: home.php");
}
?>