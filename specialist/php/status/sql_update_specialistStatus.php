<?php
$_POST = json_decode(file_get_contents('php://input'), true);

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Specialist";

$id = $_POST["id"];
$status = $_POST["status"];
$inWork = $_POST["inWork"];
$nextInWork = $_POST["nextInWork"];

$data = [ "id" => $id, "status" => $status, "inWork" => $inWork, "nextInWork" => $nextInWork ];
$sql = "UPDATE $table SET Status = :status, InWork = :inWork, NextInWork = :nextInWork WHERE Specialist.ID = :id";

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