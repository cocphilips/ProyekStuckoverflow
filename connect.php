<?php
	$con = mysqli_connect("localhost","root","","stuckoverflow");
	  if(!$con)
	  {
	    die('Could not connect: ' . mysqli_error());
	  }
