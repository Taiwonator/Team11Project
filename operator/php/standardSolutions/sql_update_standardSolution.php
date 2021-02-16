<?php
$_POST = json_decode(file_get_contents('php://input'), true);

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "StandardSolutions";

$oldName = $_POST["oldName"];
$name = $_POST["name"];
$problemType = $_POST["problemType"];
$description = $_POST["description"];

$data = [ "oldName" => $oldName, "name" => $name, "problemType" => $problemType, "description" => $description ];
$sql = "UPDATE $table SET SolutionName = :name, ProblemType = :problemType, SolutionDescription = :description WHERE StandardSolutions.SolutionName = :oldName";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $db->prepare($sql)->execute($data);

  $output = array();
  foreach($db->query("SELECT * FROM $table") as $row) {
    $row = array("name"=>$row['SolutionName'], "description"=>$row['SolutionDescription'], "problemType"=>$row['ProblemType']);
    array_push($output, $row);
  }
  echo json_encode($output);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>