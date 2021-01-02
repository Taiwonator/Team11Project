<?php
//Sam 2/1/20
	
	$servername = "35.189.96.25";
	$db = "helpdesk_database";
	$username = "pma";
	$password = "webproject@Team11";

	$conn = mysqli_connect("$servername",$username,$password,$db) or die("Bad Connect:".mysqli_connect_error());
	
	$sql = "SELECT `ProblemNumber`, `Status`, `DateSolved`, `TimeSolved`, `ProblemType`, `ID`, `ExternalSpecialist`, `SolveNotes`, `SolveMethod`";
	$sql .= "FROM Problem WHERE `Status` = 'Solved'";
	
	$res = $conn->query($sql);
	
	$conn->close();
?>