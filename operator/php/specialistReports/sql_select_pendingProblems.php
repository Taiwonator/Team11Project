<?php
$_POST = json_decode(file_get_contents('php://input'), true);

$operatorID = $_POST['id'];
$status = "unsolved";

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Problem";
try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $output = array();
  foreach($db->query("SELECT * FROM $table WHERE `Status`='pending'") as $row) {
    $row = array("problemNumber"=> strval($row['ProblemNumber']), "description"=>$row['ProbDescription'], "status"=>$row['Status'], "solveMethod"=>$row['SolveMethod'], 
    "problemType"=>$row['ProblemType'], "OS"=>$row['OS'], "softwareName"=>$row['SoftwareName'], "branchID"=>$row['BranchID'], "serialNumber"=>$row['SerialNumber'], 
    "inPerson"=>$row['InPerson'], "specialistID"=>$row['ID'], "externalSpecialistID"=>$row['ExternalID'], "dateSolved"=>$row['DateSolved'], "timeSolved"=>$row['TimeSolved'], 
    "solveMethod"=>$row['SolveMethod'], "notes"=>$row['SolveNotes'], "priority"=>$row['Priority']);
  
    // Retreives problems which the operator assigned
    $num = $row['problemNumber'];
    $select_operator_sql = "SELECT `Call`.CallID 
                            FROM CallProblem 
                            INNER JOIN `Call` On `Call`.CallID = CallProblem.CallID
                            WHERE CallProblem.ProblemNumber = $num";

    foreach ($db->query($select_operator_sql) as $row2) {
      $callID = $row2['CallID'];
      foreach ($db->query("SELECT ID FROM `Call` WHERE CallID = $callID") as $row3) {
          if($row3['ID'] == $operatorID) {
            array_push($output, $row);
          }
      }
    }

  }
  echo json_encode($output);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}       

?>
