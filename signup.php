<?php
	require_once("connect.php");

	if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"])){
		$disp_name = $_POST["name"];
		$email = $_POST["email"];
		$pass = $_POST["password"];
		$cekName = mysqli_query($con, "SELECT displayname FROM users WHERE displayname='".$disp_name."'");
		$cekEmail = mysqli_query($con, "SELECT email FROM users WHERE email='".$email."'");
		if($cekName->num_rows > 0 && $cekEmail->num_rows > 0){
			echo "Display name dan email sudah dipakai!";
		}
		elseif($cekName->num_rows > 0){
			echo "Display name sudah dipakai!";
		}
		elseif($cekEmail->num_rows > 0){
			echo "Email sudah dipakai!";
		}
		else{
			$q = mysqli_query($con, "insert into users values(0, '".$email."', '".$pass."' , '".$disp_name."')"); 
			if($q){ 
				echo "Sukses sign-up";
			}else{
				echo $con -> error;
			}
		}
	}
	else{
		echo "Terdapat field yang masih kosong!";
	}
?>