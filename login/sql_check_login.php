<?php
$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Log-in";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $output = array();
  foreach($db->query("SELECT * FROM $table") as $row) {
    $row = array("username"=>$row['Email'], "password"=>$row['Password']);
    array_push($output, $row);
  }
  echo json_encode($output);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>
