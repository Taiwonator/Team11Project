<?php
//Sam 2/1/20
	$serialNumber = intval($_GET['SerialNumber']);
	
	$servername = "35.189.96.25";
	$db = "helpdesk_database";
	$username = "pma";
	$password = "webproject@Team11";

	$conn = mysqli_connect("$servername",$username,$password,$db) or die("Bad Connect:".mysqli_connect_error());
	
	$sql = "DELETE FROM Equipment WHERE `SerialNumber` = '$SerialNumber'";
	
	$conn->query($sql);
	
	$conn->close();
?>