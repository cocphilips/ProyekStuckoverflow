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
	if($req=="search_by_word"){
		$word = $con->real_escape_string($_POST["query"]);
		$page = $con->real_escape_string($_POST["page"]);
		$curNumPage= $page+1;
		$query = "SELECT * FROM questions WHERE topik LIKE '%".$word."%' OR isi LIKE '%".$word."%'";
		$resArr = $con->query($query);
		$resCount = mysqli_num_rows($resArr);
		$pageLast= $resCount/10;
		$pageCountLast= ceil($pageLast);
		if($resCount==0){
			$output .=
			'
			<div class="row">
			<div class="col-sm-12 col-md-6 offset-md-3 mt-md-5">
				'.$resCount.' Question(s) found.
	        	<hr>
	        </div>
	        </div>

			';
			echo $output;
			exit();
			}
		$output .=
		'
		<div class="row">
		<div class="col-sm-12 col-md-6 offset-md-3 mt-md-5">
			<small>Showing page '.$curNumPage.' out of '.$pageCountLast.' pages.</small> <br>
			'.$resCount.' Question(s) found.
        	<hr>
        </div>
        </div>

		';
		$pageStart = $page*10;
		$pageEnd = $page+10;
		$query = "SELECT * FROM questions WHERE topik LIKE '%".$word."%' OR isi LIKE '%".$word."%' ORDER BY id DESC LIMIT ".$pageStart.",".$pageEnd."";
		$resArr = $con->query($query);
		while($row=mysqli_fetch_array($resArr)){
			$query2 = "SELECT * from users where id ='".$row["id_users"]."'";
			$res2=$con->query($query2);
			$name="";
			if(mysqli_num_rows($res2)==0){
				$name="<i>Uknown</i>";
			}else{
				$row2 = mysqli_fetch_array($res2);
				$name=$row2["displayname"];
			}
			
			$output.='
			<div class="row">
				<div class="col-sm-12 col-md-6 offset-md-3">
					<div class="card text-center" style="width:60%; margin: 0 auto; margin-top: 20px;">
						<div class="card-header">
							<a href="answerPage.php?id='.$row["id"].'" style="text-decoration:none; color:black;">
				        		<h5 id="judultopik" style="cursor:pointer;font-family: NunitoLight; text-align:left; margin-top:15px; margin-left:15px;"><b>'.$row["topik"].'</b></h5>

				        	</a>
					    </div>
					    <div class="card-body" style="font-size: 14px;font-family: fontCode;text-align: left; margin-left: 15px;">
					    	<p>'.$row["isi"].'</p>
					    </div>
					    <div class="card-footer text-muted">
				        	<img id="like" src="img/like.png">
				        	<span id="totallike">'.$row["likes"].'</span>
				        	<img id="answer" src="img/answers.png">
				        	<span id="totalanswer">'.$row["answerscount"].'</span>
				        	<p style="    text-align: right; font-family: fontCode; font-size: 10px; margin-right: 5px; margin-bottom: 10px;">Asked by <b>'.$name.'</b> '.$row["waktu"].'</p>
				        </div>
					</div>
				
	        		<hr>
	        	</div>
        	</div>

			';
		}
		$output.='
			<div class="row">
				<div class="col-sm-12 col-md-6 offset-md-3">
	        		
	        	';
		for($i=0;$i<$page;$i++){
			$num = $i + 1;
			$output.='<button class="btn btn-link mr-2" onclick="search('.$i.')">'.$num.'</button>';
		}
		$num = $page + 1;
		$output.='<button class="btn btn-link mr-2">'.$num.'</button>';
		for($i=$page+1;$i<$pageLast;$i++){
			$num = $i + 1;
			$output.='<button class="btn btn-link mr-2" onclick="search('.$i.')">'.$num.'</button>';
		}
		$output.='
				</div>
        	</div>

			';
		echo $output;
	}
}else{
	header("Location: home.php");
}
?>