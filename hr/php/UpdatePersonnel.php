// *********** Old format *****************

<?php

    $empName = $_GET['Name'];
    $newID = $_GET['ID'];
    $newJob = $_GET['JobTitle'];
    $newDept = $_GET['Dept'];
    $newEmail = $_GET['Email'];
    $newBranch = intval($_GET['BranchID']);
    
    $servername = "35.189.96.25";
	$db = "helpdesk_database";
	$username = "pma";
	$password = "webproject@Team11";

	$conn = mysqli_connect("$servername",$username,$password,$db) or die("Bad Connect:".mysqli_connect_error());
    
    $sql = "UPDATE Personnel INNER JOIN Personnel-ID ON Personnel.ID = Personnel-ID.ID SET `JobTitle` = '$newJob', `Dept` = '$newDept', `Email` = '$newEmail', `BranchID` = '$newBranch'' WHERE `ID` = '$empID'";
    
    $res = $conn->query($sql);
	
	$conn->close();
?>


// ************** Changed format ****************

<?php

$_POST = json_decode(file_get_contents('php://input'), true);

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Personnel";

$oldName = $_POST['oldName'];
$oldID = $_POST['oldID'];
$oldJob = $_POST['oldJob'];
$oldExt = $_POST['oldExt'];
$oldDept = $_POST['oldDept'];
$oldEmail = $_POST['oldEmail'];
$oldBranch = intval($_POST['oldBranchID']);
$newName = $_POST['newName'];
$newID = $_POST['newID'];
$newJob = $_POST['newJobTitle'];
$newExt = $_POST['newExt'];
$newDept = $_POST['newDept'];
$newEmail = $_POST['newEmail'];
$newBranch = intval($_POST['newBranchID']);

if ($newID = "") {
    $newID = $oldID;
}
if ($newName = "") {
    $newName = $oldName;                 //if new value left blank, revert to old value
}
if ($newJob = "") {
    $newJob = $oldJob;
}
if ($newExt = "") {
    $newExt = $oldExt;
}
if ($newDept = "") {
    $newDept = $oldDept;
}
if ($newEmail = "") {
    $newEmail = $oldEmail;
}
if ($newBranch = "") {
    $newBranch = $oldBranch;
}

$data = [ "oldName" => $oldName, "newName" => $newName, "oldID" => $oldID, "newID" => $newID, "oldJob" => $oldJob, "newJob" => $newJob, "oldExt" => $oldExt, "newExt" => $newExt, "oldDept" => $oldDept, "newDept" => $newDept, "oldEmail" => $oldEmail, "newEmail" => $newEmail, "oldBranch" => $oldBranch, "newBranch" => $newBranch ];
$sql = "UPDATE $table INNER JOIN Personnel_ID ON Personnel.ID=Personnel_ID.ID SET Name = :newName, ID = :newID, JobTitle = :newJob, Ext = :newExt, Dept = :newDept, Email = :newEmail, BranchID = :newBranchID WHERE Personnel.ID = :oldID AND Personnel_ID.Name = :oldName AND Personnel.JobTitle = :oldJob AND Personnel_ID.Ext = :oldExt AND Personnel.Dept = :oldDept AND Personnel.Email = :oldEmail AND Personnel.BranchID = :oldBranch ";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $db->prepare($sql)->execute($data);
    
  $output = array();
    
  foreach($db->query("SELECT Personnel.ID, Personnel_ID.Name, Personnel_ID.Ext, Personnel.JobTitle, Personnel.Dept, Personnel.Email, Personnel.BranchID FROM Personnel INNER JOIN Personnel_ID ON Personnel.ID=Personnel_ID.ID") as $row) {
    $row = array("id"=>$row['ID'], "name"=>$row['Name'], "ext"=>$row['Ext'], "jobTitle"=>$row['JobTitle'], "dept"=>$row['Dept'], "email"=>$row['Email'], "branchID"=>$row['BranchID']);
    array_push($output, $row);
  }
  echo json_encode($output);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>
