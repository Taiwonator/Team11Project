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
  //$sqlQuery = "SELECT * FROM Personnel";
  $output = array();
  foreach($db->query("SELECT * FROM Personnel") as $row) {
    $row = array("id"=>$row['ID'], "jobTitle"=>$row['JobTitle'], "dept"=>$row['Dept'], "email"=>$row['Email'], "branchID"=>$row['BranchID']);
    if ($row[3] == $email){array_push($output, $row);}
  }
  echo json_encode($output);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
