<?php
$_POST = json_decode(file_get_contents('php://input'), true);

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Personnel";

$oldID = $_POST["oldID"];
$ID = $_POST["ID"];
$name = $_POST['name'];
$ext = $_POST['ext'];
$jobTitle = $_POST['jobTitle'];
$dept = $_POST['dept'];
$email = $_POST['email'];
$branchID = $_POST['branchID'];

$select_sql = "SELECT Email FROM `Log-in` WHERE Email='$email'";

$login_data = [ "email" => $email, "password" => 'no password' ];
$login_SQL = "INSERT INTO `Log-in` (Email, Password) VALUES (:email, :password)";

$personnel_data = [ "oldID" => $oldID, "ID" => $ID, "jobTitle" => $jobTitle, "dept" => $dept, "email" => $email, "branchID" => $branchID ];
$personnel_sql = "UPDATE $table 
                  SET ID = :ID, 
                  JobTitle = :jobTitle, 
                  Dept = :dept, 
                  Email = :email, 
                  BranchID = :branchID 
                  WHERE Personnel.ID = :oldID";

$personnel_ID_data = [ "oldID" => $oldID, "name" => $name, "ext" => $ext ];
$personnel_ID_sql = "UPDATE Personnel_ID 
                     SET Name = :ID, 
                     Ext = :ext, 
                     WHERE Personnel_ID.ID = :oldID";
  
print_r($data);

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $count = $db->query($select_sql)->fetchColumn(); 
  if(empty($count)) {
    $db->prepare($login_SQL)->execute($login_data);
  } 

  $db->prepare($personnel_sql)->execute($personnel_data);
  $db->prepare($personnel_ID_sql)->execute($personnel_ID_data);

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

// Insert new email 
// Update personnel table

?>