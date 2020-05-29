<?php
session_start();
require_once("connect.php");
if (isset($_POST["email"]) && isset($_POST["password"])) {
	$email = $_POST["email"];
	$pass = $_POST["password"];
	$cekEmail = mysqli_query($con, "SELECT id,email, displayname FROM users WHERE email='" . $email . "'");
	$cekPassword = mysqli_query($con, "SELECT password FROM users WHERE password='" . $pass . "'");
	if ($cekEmail->num_rows == 0) {
		echo "Email yang dimasukkan salah atau belum terdaftar!";
	} elseif ($cekPassword->num_rows == 0) {
		echo "Password yang dimasukkan salah!";
	} else {
		$row = $cekEmail->fetch_assoc();
		echo "Login sukses!";
		$_SESSION["login"] = true;
		$_SESSION["dispname"] = $row["displayname"];
		$_SESSION["id"] = $row["id"];
	}
}
