<?php
// need to know the operator's user ID to know their branch ID

    $BranchID = intval($_GET['BranchID']);
    
    $servername = "35.189.96.25";
	$db = "helpdesk_database";
	$username = "pma";
	$password = "webproject@Team11";

	$conn = mysqli_connect("$servername",$username,$password,$db) or die("Bad Connect:".mysqli_connect_error());
    
    $sql = "SELECT `ID`, `NumJobs`, `PartTime`, `Status`, `InWork`, `NextInWork`";
    $sql. = "FROM Specialist JOIN Personnel"; 
    $sql. = "ON Specialist.ID = Personnel.ID";
    $sql. = "WHERE `BranchID` = '$BranchID'";
    
    $res = $conn->query($sql);
	
	$conn->close();
?>