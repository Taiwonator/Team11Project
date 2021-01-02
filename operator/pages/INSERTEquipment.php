<?php
//Sam 2/1/20
	$serialNumber = intval($_GET['SerialNumber']);
	$type = $_GET['type'];
	$make = $_GET['make'];
	
	$servername = "35.189.96.25";
	$db = "helpdesk_database";
	$username = "pma";
	$password = "webproject@Team11";

	$conn = mysqli_connect("$servername",$username,$password,$db) or die("Bad Connect:".mysqli_connect_error());
	
	$sql = "INSERT INTO Equipment (SerialNumber, Type, Make)
	VALUES ('$serialNumber', '$type', '$make'";
	
	$conn->query($sql);
	
	$conn->close();
?>