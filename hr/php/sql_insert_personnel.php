<?php
$_POST = json_decode(file_get_contents('php://input'), true);

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Personnel";

$id = $_POST['id'];
$name = $_POST['name'];
$ext = $_POST['ext'];
$jobTitle = $_POST['jobTitle'];
$dept = $_POST['dept'];
$email = $_POST['email'];

$data = [ "id" => $id, "name" => $name, "ext" => $ext, "jobTitle" => $jobTitle, "dept" => $dept, "email" => $email ];
$login_SQL = "INSERT INTO `Log-in` (Email, Password) VALUES (:email, 'no password')";
$personnel_SQL = "INSERT INTO $table (ID, JobTitle, Dept, Email, BranchID) VALUES (:id, :name, :ext, :jobTitle, :dept, :email)";
$personnel_ID_SQL = "INSERT INTO Personnel_ID (Ext, ID) VALUES (:ext, :id)";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->prepare($login_SQL)->execute($data);
  $db->prepare($personnel_SQL)->execute($data);
  $db->prepare($personnel_ID_SQL)->execute($data);

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

