<?php
session_start();
require_once("connect.php");

if (!empty($_POST["title"]) && !empty($_POST["isi"])) {
	$title = $_POST["title"];
	$isi = $_POST["isi"];
	if (!empty($_POST["tag"])) {
		$tags = $_POST["tag"];
		$tag = explode(",", $tags);
	}

	$cekJudul = mysqli_query($con, "SELECT * FROM questions WHERE topik='" . $title . "'");

	if ($cekJudul->num_rows > 0) {
		echo "Topik sudah dibahas!";
	} else {
		$q = mysqli_query($con, "INSERT INTO questions (id,topik,isi,id_users) VALUES (0, '" . $title . "', '" . $isi . "','" . $_SESSION['id'] . "')");
		if (!empty($_POST["tag"])) {
			$cekJudul = mysqli_query($con, "SELECT * FROM questions WHERE topik='" . $title . "'");
			$row = $cekJudul->fetch_assoc();
			$getID = $row["id"];

			echo $getID;

			for ($x = 0; $x < count($tag); $x++) {
				$q2 = mysqli_query($con, "INSERT INTO tags Values(0, " . $getID . ", '" . $tag[$x] . "')");
			}
		}
	}
} else {
	echo "gagal";
}
