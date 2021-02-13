<?php
$_POST = json_decode(file_get_contents('php://input'), true);

$servername = "35.189.96.25";
$db = "helpdesk_database";
$username = "pma";
$password = "webproject@Team11";

// $email = $_POST['email'];
$email = "dummy2@gmail.com";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $output = array();
  foreach($db->query("SELECT * FROM Personnel WHERE Personnel.Email = $email") as $row) {
    $row = array("id"=>$row['ID'], "jobTitle"=>$row['JobTitle'], "dept"=>$row['Dept'], "email"=>$row['Email'], "branchID"=>$row['BranchID']);
    array_push($output, $row);
  }
  echo json_encode($output);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
} 

?>

