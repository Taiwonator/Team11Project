<?php
$_POST = json_decode(file_get_contents('php://input'), true);

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Specialist";

$branchID = $_POST['branchID'];

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $output = array();
  foreach($db->query("SELECT Specialist.ID, SpecialistProblemType.ProblemType, Specialist.NumJobs, Specialist.Status, Specialist.InWork, Specialist.PartTime, Specialist.NextInWork, Personnel_ID.Name, Personnel_ID.Ext
                      FROM Specialist 
                      INNER JOIN SpecialistProblemType ON Specialist.ID=SpecialistProblemType.ID
                      INNER JOIN Personnel_ID ON Specialist.ID=Personnel_ID.ID
                      INNER JOIN Personnel ON Specialist.ID=Personnel.ID WHERE Personnel.BranchID=$branchID") as $row) {

    $row = array("id"=>$row['ID'], "problemType"=>$row['ProblemType'], "numJobs"=>$row['NumJobs'], "status"=>$row['Status'], 
                 "inWork"=>$row['InWork'], "partTime"=>$row['PartTime'], "nextInWork"=>$row['NextInWork'], "name"=>$row['Name'],"ext"=>$row['Ext']);
    array_push($output, $row);
  }
  echo json_encode($output);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>