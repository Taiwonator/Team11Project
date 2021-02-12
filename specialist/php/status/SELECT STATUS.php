<?php

//Ethan 03/01/21

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Specialist";
try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $output = array();
  foreach($db->query("SELECT `ID`, `Status` FROM $table") as $row) {
    $row = array("status"=>$row['Status']);
    array_push($output, $row);
  }
  echo json_encode($output);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>