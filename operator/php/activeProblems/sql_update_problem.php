<?php

// update problem to pending

$_POST = json_decode(file_get_contents('php://input'), true);

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Problem";

$OS = $_POST["OS"];
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

$data = [ "problemNumber" => getValue($problemNumber), 
          "branchID" => getValue($branchID), 
          "description" => getValue($description), 
          "externalSpecialistID" => getValue($externalSpecialistID), 
          "inPerson" => getValue($inPerson), 
          "solveNotes" => getValue($solveNotes), 
          "priority" => getValue($priority), 
          "problemType" => getValue($problemType), 
          "serialNumber" => getValue($serialNumber), 
          "softwareName" => getValue($softwareName), 
          "solveMethod" => getValue($solveMethod), 
          "specialistID" => getValue($specialistID), 
          "OS" => getValue($OS) ];
print_r($data);

$sql = "UPDATE $table 
        SET OS = :OS, BranchID = :branchID, ProbDescription = :description, InPerson = :inPerson, ExternalID = :externalSpecialistID, SolveNotes = :solveNotes, Priority = :priority
        ProblemType = :problemType, SerialNumber = :serialNumber, SoftwareName = :softwareName, SolveMethod = :solveMethod, ID = :specialistID 
        WHERE Problem.ProblemNumber = :problemNumber";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $db->prepare($sql)->execute($data);

  $output = array();
  foreach($db->query("SELECT * FROM $table WHERE (`BranchID`=122 AND `Status`='unsolved')") as $row) {
    $row = array("problemNumber"=> strval($row['ProblemNumber']), "description"=>$row['ProbDescription'], "status"=>$row['Status'], "solveMethod"=>$row['SolveMethod'], 
    "problemType"=>$row['ProblemType'], "OS"=>$row['OS'], "softwareName"=>$row['SoftwareName'], "branchID"=>$row['BranchID'], "serialNumber"=>$row['SerialNumber'], 
    "inPerson"=>$row['InPerson'], "solveMethod"=>$row['SolveMethod'], "solveNotes"=>$row['SolveNotes'], "priority"=>$row['Priority']);
    array_push($output, $row);
  }
  echo json_encode($output);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

function getValue($value) {
  if($value == "") {
    return NULL;
  } else {
    if(is_numeric($value)) {
      return (int)$value;
    } else {
      return $value;
    }
  }
}

?>
