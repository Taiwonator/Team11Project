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
  
  print_r("first part done");
  if($flag) {
    $select_sql = "SELECT Personnel.ID, Personnel.JobTitle, Personnel.Dept, Personnel.Email, Personnel.BranchID, Personnel_ID.Name 
                   FROM Personnel 
                   INNER JOIN Personnel_ID ON Personnel_ID.ID=Personnel.ID
                   WHERE Personnel.Email='$userEmail'";
    $data = $db->query($select_sql)->fetchColumn();
    print_r("second part done");
    echo json_encode($data);
  } else {
    echo json_encode(false);
  }
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>
