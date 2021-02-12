<?php

//Ethan 03/01/21

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Problem";
try {
	
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $output = array();
  foreach($db->query("SELECT `Problem_No.`, `Serial_No.`,`Caller_Name`, `Operator_Name` FROM $table WHERE `Status` = 'unsolved'") as $row) {
    $row = array("problemNo."=>$row['ProblemNo.'], "serialNo."=>$row['SerialNo.'], "callerName"=>$row['CallerName'], "operatorName"=>$row['OperatorName']);
    array_push($output, $row);
  }
  echo json_encode($output);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
