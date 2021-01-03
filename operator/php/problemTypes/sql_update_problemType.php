<?php
$_POST = json_decode(file_get_contents('php://input'), true);

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "ProblemType";

$old = $_POST["oldProblemType"];
$new = $_POST["newProblemType"];

$data = [ "oldProblemType" => $old, "newProblemType" => $new ];
$sql = "UPDATE $table SET ProblemType = :new WHERE ProblemType.ProblemType = :old";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $db->prepare($sql)->execute($data);

  $output = array();
  foreach($db->query("SELECT * FROM $table") as $row) {
    $row = array("problemType"=>$row['ProblemType']);
    array_push($output, $row);
  }
  echo json_encode($output);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>