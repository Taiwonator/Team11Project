<?php
$_POST = json_decode(file_get_contents('php://input'), true);

$id = "1";

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Specialist";
try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $output = array();
  foreach($db->query("SELECT * from $table WHERE ID=$id") as $row) {
    $row = array("status"=>$row['Status'], "inWork"=>$row['InWork'], "nextInWork"=>$row['NextInWork']);
    array_push($output, $row);
  }
  echo json_encode($output);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>