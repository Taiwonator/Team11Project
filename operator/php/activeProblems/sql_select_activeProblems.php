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
  foreach($db->query("SELECT * FROM $table WHERE `Status`='unsolved'") as $row) {
    $row = array("problemNumber"=> strval($row['ProblemNumber']), "description"=>$row['ProbDescription'], "status"=>$row['Status'], "solveMethod"=>$row['SolveMethod'], 
    "problemType"=>$row['ProblemType'], "OS"=>$row['OS'], "softwareName"=>$row['SoftwareName'], "branchID"=>$row['BranchID'], "serialNumber"=>$row['SerialNumber'], 
    "inPerson"=>$row['InPerson'], "specialistID"=>$row['ID'], "externalSpecialistID"=>$row['ExternalID'], "dateSolved"=>$row['DateSolved'], "timeSolved"=>$row['TimeSolved'], 
    "solveMethod"=>$row['SolveMethod'], "notes"=>$row['SolveNotes'], "priority"=>$row['Priority']);
  
    $num = $row->problemNumber;
    print_r($num);
    $select_operator_sql = "SELECT Call.ID 
                            FROM `Call` 
                            INNER JOIN CallProblem ON Call.ID=CallProblem.CallID
                            WHERE CallProblem.ProblemNumber = $num";

    // foreach ($db->query($select_operator_sql) as $row2) {
    //   // print_r($row2);
    // }

    // array_push($output, $row);
  }
  echo json_encode($output);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}       

?>
