//*************** Old format **************

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

//************** Changed format ************


<?php
// need to know the operator's user ID to know their branch ID

$_POST = json_decode(file_get_contents('php://input'), true);

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Specialist";

$branchID = intval($_POST['BranchID']);

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $output = array();
  foreach($db->query("SELECT Specialist.ID, Specialist.NumJobs, Specialist.PartTime, Specialist.Status, Specialist.InWork, Specialist.NextInWork FROM Specialist INNER JOIN Personnel ON Specialist.ID=Personnel.ID WHERE Personnel.BranchID = $branchID") as $row) {
    $row = array("SpecialistID"=>$row['ID'], "numJobs"=>$row['NumJobs'], "partTime"=>$row['PartTime'], "status"=>$row['Status'], "inWork"=>$row['InWork'], "nextInWork"=>$row['NextInWork']);
    array_push($output, $row);
  }
  echo json_encode($output);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>
