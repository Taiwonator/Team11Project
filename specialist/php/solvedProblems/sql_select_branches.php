<?php
$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Branch";
try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $output = array();
  foreach($db->query("SELECT * FROM $table") as $row) {
    $row = array("id"=>$row['BranchID'], "name"=>$row['BranchName'], "city"=>$row['City'], "country"=>$row['Country'], "telephone"=>$row['Telephone']);
    array_push($output, $row);
  }
  echo json_encode($output);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>