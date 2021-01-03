<?php
$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Personnel";
try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $output = array();
  foreach($db->query("SELECT Personnel.ID, Personnel_ID.Name, Personnel_ID.Ext, Personnel.JobTitle, Personnel.Dept, Personnel.Email, Personnel.BranchID FROM Personnel INNER JOIN Personnel_ID ON Personnel.ID=Personnel_ID.ID") as $row) {
    $row = array("id"=>$row['ID'], "name"=>$row['Name'], "ext"=>$row['Ext'], "jobTitle"=>$row['JobTitle'], "dept"=>$row['Dept'], "email"=>$row['Email'], "branchID"=>$row['BranchID']);
    array_push($output, $row);
  }
  echo json_encode($output);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

// SELECT ID, NAME, EXT, ..... FROM PERSONNEL INNER JOIN PERSONNELid ON PERSONNEL.ID = PERSONNEL.ID

?>