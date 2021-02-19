<?php

$_POST = json_decode(file_get_contents('php://input'), true);

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Log-in";

$userEmail = $_POST['username'];
$userPassword = $_POST['password'];

print_r($userEmail . ' - ' . $userPassword);

$flag = false;

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  foreach($db->query("SELECT * FROM `Log-in`") as $row) {
    if($row['Email'] == $userEmail && $row['Password'] == $userPassword) {
        $flag = true;
    }
  }
  echo json_encode($flag);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>
