<?php
$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Specialist";
try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $output = array();
  foreach($db->query("SELECT Specialist.ID, SpecialistProblemType.ProblemType, Specialist.NumJobs, Specialist.Status, Specialist.InWork, Specialist.PartTime, Specialist.NextInWork FROM Specialist INNER JOIN SpecialistProblemType ON Specialist.ID=SpecialistProblemType.ID") as $row) {
    $row = array("id"=>$row['ID'], "problemType"=>$row['ProblemType'], "numJobs"=>$row['NumJobs'], "status"=>$row['Status'], "inWork"=>$row['InWork'], "partTime"=>$row['PartTime'], "nextInWork"=>$row['NextInWork']);
    array_push($output, $row);
  }
  echo json_encode($output);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>