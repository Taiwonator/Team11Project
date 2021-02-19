<?php
$_POST = json_decode(file_get_contents('php://input'), true);

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";

$id = $_POST['id'];
$name = $_POST['name'];
$ext = $_POST['ext'];
$jobTitle = $_POST['jobTitle'];
$dept = $_POST['dept'];
$email = $_POST['email'];

$data = [ "id" => $id, "name" => $name, "ext" => $ext, "jobTitle" => $jobTitle, "dept" => $dept, "email" => $email ];
$sql = "INSERT INTO $table (ID, JobTitle, Dept, Email, BranchID) VALUES (:id, :name, :ext, :jobTitle, :dept, :email)";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $db->prepare($sql)->execute($data);

  $output = array();
  foreach($db->query("SELECT * FROM $table") as $row) {
    $row = array("id"=>$row['ID'], "name"=>$row['Name'], "ext"=>$row['Ext'], "jobTitle"=>$row['JobTitle'], "dept"=>$row['Dept'], "email"=>$row['Email'], "branchID"=>$row['BranchID']);
    array_push($output, $row);
  }
  echo json_encode($output);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

// Insert into login table
// Insert into personnel table
// Insert into personnel ID table

?>

