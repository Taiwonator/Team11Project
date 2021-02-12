<?php
$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Equipment";
try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $output = array();
  foreach($db->query("SELECT Personnel.*, Personnel_ID.* FROM Personnel JOIN Personnel_ID ON Personnel.ID = Personnel_ID.ID") as $row) {
    $row = array("serialNumber"=>$row['SerialNumber'], "type"=>$row['Type'], "make"=>$row['Make']);
    array_push($output, $row);
  }
  echo json_encode($output);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>