<?php
$_POST = json_decode(file_get_contents('php://input'), true);

$servername = "35.189.96.25";
$db = "helpdesk_database";
$username = "pma";
$password = "webproject@Team11";

// $email = $_POST['email'];
$email = "dummy2@gmail.com";

try {
  $db = mysqli_connect("$servername",$username,$password,$db) or die("Bad Connect:".mysqli_connect_error());
  $sqlQuery = "SELECT * FROM Personnel WHERE Personnel.Email = $email";
  $output = array();
  //$row = $db->query($sqlQuery);
  //$row = array("id"=>$row['ID'], "jobTitle"=>$row['JobTitle'], "dept"=>$row['Dept'], "email"=>$row['Email'], "branchID"=>$row['BranchID']);
  //$db->close();
  echo json_encode($output);

} catch (Exception $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>
