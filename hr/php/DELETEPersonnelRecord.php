<?php
//Sam 2/1/20
	$id = intval($_GET['id']);
	
	$servername = "35.189.96.25";
	$db = "helpdesk_database";
	$username = "pma";
	$password = "webproject@Team11";

	$conn = mysqli_connect("$servername",$username,$password,$db) or die("Bad Connect:".mysqli_connect_error());
	
	$sql = "DELETE FROM Personnel WHERE `ID` = '$id'";
	
	$conn->query($sql);
	
	$conn->close();
?>