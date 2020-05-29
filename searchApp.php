<?php
session_start();
include "connect.php";
if(isset($_POST["requestType"])){
	$req = $con->real_escape_string($_POST["requestType"]);
	$output = "";
	if($req=="search"){
		$qry = $con->real_escape_string($_POST["query"]);
		//USER
		$qry1 = "SELECT * FROM users WHERE displayname LIKE '%".$qry."%' ORDER BY displayname ASC";
		$res1 = $con->query($qry1);
		$res1Count = mysqli_num_rows($res1);
		$output .=
		'
		<div class="row">
		<div class="col-sm-12 col-md-6 offset-md-3 mt-md-5">
			'.$res1Count.' User(s) found
        	<hr>
        </div>
        </div>

		';
		while($row = mysqli_fetch_array($res1)){
			$name = $row["displayname"];
			$output.=
			'
			<div class="row mt-2">
				<div class="col-sm-12 col-md-6 offset-md-3">
	        		<a href="profile.php?user='.$name.'" style="text-decoration:none; color:black;"><img src="img/qna.png" width="50" class="mr-3">'.$name.'</a>
	        	</div>
        	</div>

			';
		}
		echo $output;

	}
}else{
	header("Location: home.php");
}
?>