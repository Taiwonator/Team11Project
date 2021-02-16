<?php

// update problem to unsolved

$_POST = json_decode(file_get_contents('php://input'), true);

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Problem";

$problemNumber = $_POST["problemNumber"];
$status = "unsolved"; 
$branchID = $_POST["branchID"];
$inPerson = $_POST["inPerson"];
$priority = $_POST["priority"];
$probDescripion = $_POST["probDescription"];
$OS = $_POST["OS"];
$softwareName = $_POST["softwareName"];
$serialNumber = $_POST["serialNumber"];
$dateSolved = $_POST["dateSolved"];
$timeSolved = $_POST["timeSolved"];
$solveMethod = $_POST["solveMethod"];
$solveNotes = $_POST["solveNotes"];
$problemType = $_POST["problemType"];
$ID = $_POST["ID"];
$externalID = $_POST["externalID"];

$data = [ "problemNumber" => $problemNumber, "oldStatus" => $oldStatus, "status" => $status, "branchID" => $branchID, "inPerson" => $inPerson, "priority" => $priority, "probDescription" => $probDescription, "OS" => $OS, "softwareName" => $softwareName, "serialNumber" => $serialNumber, "dateSolved" => $dateSolved, "timeSolved" => $timeSolved, "solveMethod" => $solveMethod, "solveNotes" => $solveNotes, "problemType" => $problemType, "ID" => $ID, "externalID" => $externalID ];
$sql = "UPDATE $table SET ProblemNumber = :problemNumber, Status = :status, BranchID = :branchID, InPerson = :inPerson, Priority = :priority, ProblemDescription = :probDescription, OS = :OS, SoftwareName = :softwareName, SerialNumber = :serialNumber, DateSolved = :dateSolved, TimeSolved = :timeSolved, SolveMethod = :solveMethod, SolveNotes = :solveNotes, ProblemType = :problemType, ID = :ID, ExternalID = :externalID WHERE Problem.ProblemNumber = :ProblemNumber";

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
