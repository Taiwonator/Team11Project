<?php
$_POST = json_decode(file_get_contents('php://input'), true);

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Problem";

$problemNumber = $_POST["problemNumber"];
$notes = $_POST["notes"];

$data = [ "problemNumber" => $problemNumber, "notes" => $notes ];
$sql = "UPDATE $table SET SolveNotes = :notes WHERE Problem.problemNumber = :problemNumber";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $db->prepare($sql)->execute($data);

  $output = "Update complete";
  echo json_encode($output);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>