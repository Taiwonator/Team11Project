<?php
$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Problem";
try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $output = array();
  foreach($db->query("SELECT * FROM $table WHERE Status='solved'") as $row) {
    $row = array("problemNumber"=>$row['ProblemNumber'], "description"=>$row['ProbDescription'], "status"=>$row['Status'], "solveMethod"=>$row['SolveMethod'], 
    "problemType"=>$row['ProblemType'], "OS"=>$row['OS'], "softwareName"=>$row['SoftwareName'], "branchID"=>$row['BranchID'], "serialNumber"=>$row['SerialNumber'], 
    "inPerson"=>$row['InPerson'], "specialistID"=>$row['ID'], "externalSpecialistID"=>$row['ExternalID'], "dateSolved"=>$row['DateSolved'], "timeSolved"=>$row['TimeSolved'], 
    "solveMethod"=>$row['SolveMethod'], "notes"=>$row['SolveNotes']);
    array_push($output, $row);
  }
  echo json_encode($output);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

//     prob no. x,
//     serialNo x,                TABLE   
//     softwareName x,            TABLE
//     OS x,                      DROPDOWN
//     problemType x,             DROPDOWN
//     problemDescription x,      TEXTAREA
//     branch x,                  DROPDOWN
//     priority,                DROPDOWN
//     status (solved?) x,        CHECKBOX
//     inPerson x,                CHECKBOX
//     specialistID,            TABLE
//     externalSpecialistID,    TABLE
//     dateSolved,              NULL / DATE NOW
//     timeSolved,              NULL / TIME NOW
//     solveMethod x,             TEXTAREA
//     notes          

?>
