<?php
$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Log-in";

$username = $_POST['Email'];
$password = $_POST['Password'];

print_r($username . ' - ' . $password);

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $output = array();
  foreach($db->query("SELECT * FROM `Log-in`") as $row) {
    $row = array("username"=>$row['Email'], "password"=>$row['Password']);
    array_push($output, $row);
  }
  echo json_encode($output);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>
