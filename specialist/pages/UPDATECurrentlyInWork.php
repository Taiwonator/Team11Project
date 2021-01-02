<?php
//Sam 2/1/20
//need to have currently logged in user's ID
	$id = intval($_GET['id']);
	$newVal = intval($_GET['newVal']);
	
	$servername = "35.189.96.25";
	$db = "helpdesk_database";
	$username = "pma";
	$password = "webproject@Team11";

	$conn = mysqli_connect("$servername",$username,$password,$db) or die("Bad Connect:".mysqli_connect_error());
	
	$sql = "UPDATE Specialist SET `InWork` = '$newVal' WHERE `ID` = '$id'";
	
	$conn->query($sql);
	
	$conn->close();
?>