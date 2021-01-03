<?php

    $softwareName = $_GET['SoftwareName'];
    $newLicensed = intval($_GET['Licensed']);
    $newSupported = intval($_GET['Supported']);
    
    	$servername = "35.189.96.25";
	$db = "helpdesk_database";
	$username = "pma";
	$password = "webproject@Team11";

	$conn = mysqli_connect("$servername",$username,$password,$db) or die("Bad Connect:".mysqli_connect_error());
    
    	$sql = "UPDATE Software SET `Licensed` = '$newLicensed', `Supported` = '$newSupported' WHERE `SoftwareName` = '$softwareName'";
    
    	$res = $conn->query($sql);
	
	$conn->close();
?>
