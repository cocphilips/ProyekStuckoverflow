<?php
session_start();
require_once("connect.php");
if (isset($_POST["email"]) && isset($_POST["password"])) {
	$email = $_POST["email"];
	$pass = $_POST["password"];
	$cek = mysqli_query($con, "SELECT id,password,email, displayname FROM users WHERE email='" . $email . "'");
	$res = $cek->fetch_assoc();
	if ($cek->num_rows == 0) {
		echo "Email yang dimasukkan salah atau belum terdaftar!";
	} elseif (password_verify($pass, $res["password"])) {
		$_SESSION["login"] = true;
		$_SESSION["dispname"] = $res["displayname"];
		$_SESSION["id"] = $res["id"];
		echo "Login sukses!";
	} else {
		echo "Password yang dimasukkan salah!";
	}
}
