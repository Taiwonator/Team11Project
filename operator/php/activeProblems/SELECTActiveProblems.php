<?php
//Sam 2/1/20
	//need to have currently logged in user's ID to get branch ID
	
	$BranchID = intval($_GET['BranchID']);
	
	$servername = "35.189.96.25";
	$db = "helpdesk_database";
	$username = "pma";
	$password = "webproject@Team11";

	$conn = mysqli_connect("$servername",$username,$password,$db) or die("Bad Connect:".mysqli_connect_error());
	
	$sql = "SELECT `ProblemNumber`, `ID`, `ExternalID`, `ProblemType`, `SerialNumber`, `SoftwareName`";
	$sql .= "FROM Problem WHERE `Status` <> 'Solved' AND `BranchID = '$BranchID'";
	
	$res = $conn->query($sql);
	
	$conn->close();
?>