<?php
$_GET = json_decode(file_get_contents('php://input'), true);

$emailtest = $_GET['email'];
echo($emailtest);
$email = "dummy2@gmail.com";

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Personnel";
try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  //$output = array();
  foreach($db->query("SELECT * FROM Personnel") as $row) {
    $row = array("id"=>$row['ID'], "jobTitle"=>$row['JobTitle'], "dept"=>$row['Dept'], "email"=>$row['Email'], "branchID"=>$row['BranchID']);
    if ($row["email"] == $email){echo json_encode($row);}//array_push($output, $row);}
  }
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
