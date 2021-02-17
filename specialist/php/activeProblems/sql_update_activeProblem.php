<?php
$_POST = json_decode(file_get_contents('php://input'), true);

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Problem";

$problemNumber = $_POST["problemNumber"];
$solveNotes = $_POST["solveNotes"];
$solveMethod = $_POST["solveMethod"];

$data = [ "problemNumber" => $problemNumber, "solveNotes" => $solveNotes, "solveMethod" => $solveMethod ];
$sql = "UPDATE $table SET SolveNotes = :solveNotes, SolveMethod = :solveMethod WHERE Problem.problemNumber = :problemNumber";

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