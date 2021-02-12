<?php
$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "ExternalSpecialist";
try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $output = array();
  foreach($db->query("SELECT * from $table") as $row) {
    $row = array("externalID"=>$row['ExternalID'], "name"=>$row['Name'], "contactNumber"=>$row['ContactNumber'], "expertise"=>$row['Expertise']);
    array_push($output, $row);
  }
  echo json_encode($output);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>