<?php
$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Log-in";
$email = $_GET['username'];
$password = $_GET['password'];

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $output = array();
  foreach($db->query("SELECT * FROM $table WHERE `Email` = $email  AND `Password` = $password") as $row) {
    $row = array("password"=>$row['Password'], "email"=>$row['Email']);
    array_push($output, $row);
  }
  echo json_encode($output);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>
