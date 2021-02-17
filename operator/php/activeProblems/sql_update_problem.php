<?php

// update problem to pending

$_POST = json_decode(file_get_contents('php://input'), true);

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Problem";

$problemNumber = $_POST["problemNumber"];
$branchID = $_POST["branchID"];
$description = $_POST["description"];
$externalSpecialistID  = $_POST["externalSpecialistID"];
$inPerson = $_POST["inPerson"];
$solveNotes = $_POST["solveNotes"];
$priority = $_POST["priority"];
$problemType = $_POST["problemType"];
$serialNumber = $_POST["serialNumber"];
$softwareName = $_POST["softwareName"];
$solveMethod = $_POST["solveMethod"];
$specialistID = $_POST["specialistID"];

$data = [ "problemNumber" => $problemNumber, "branchID" => $branchID, "description" => $description, "externalID" => $externalSpecialistID, "inPerson" => $inPerson, 
          "solveNotes" => $solveNotes, "priority" => $priority, "problemType" => $problemType, "serialNumber" => $serialNumber, "softwareName" => $softwareName, "solveMethod" => $solveMethod, "specialistID" => $specialistID];
$sql = "UPDATE $table SET ProblemNumber = :problemNumber, BranchID = :branchID, ProbDeescription = :description, InPerson = :inPerson, SolveNotes = :solveNotes, priority = :priority
        ProblemType = :problemType, SerialNumber = :serialNumber, SoftwareName = :softwareName, SolveMethod = :solveMethod, ID = :specialistID";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $db->prepare($sql)->execute($data);

  $output = array();
  foreach($db->query("SELECT * FROM $table") as $row) {
    $row = array("problemNumber"=> strval($row['ProblemNumber']), "description"=>$row['ProbDescription'], "status"=>$row['Status'], "solveMethod"=>$row['SolveMethod'], 
    "problemType"=>$row['ProblemType'], "OS"=>$row['OS'], "softwareName"=>$row['SoftwareName'], "branchID"=>$row['BranchID'], "serialNumber"=>$row['SerialNumber'], 
    "inPerson"=>$row['InPerson'], "dateSolved"=>$row['DateSolved'], "timeSolved"=>$row['TimeSolved'], 
    "solveMethod"=>$row['SolveMethod'], "solveNotes"=>$row['SolveNotes'], "priority"=>$row['Priority']);
    array_push($output, $row);
  }
  echo json_encode($output);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>
