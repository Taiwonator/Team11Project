<?php
//$_POST = json_decode(file_get_contents('php://input'), true);

// $email = $_POST['email'];
$email = "dummy2@gmail.com";


  //$row = $db->query($sqlQuery);
  //$row = array("id"=>$row['ID'], "jobTitle"=>$row['JobTitle'], "dept"=>$row['Dept'], "email"=>$row['Email'], "branchID"=>$row['BranchID']);


$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Personnel";
try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $output = array();

  echo json_encode("more testing");
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
