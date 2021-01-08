<?php
$_POST = json_decode(file_get_contents('php://input'), true);

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";

$callTable = "Call";

$callerName = $_POST['callerName'];
$extension = $_POST['extension'];
$date = $_POST['date'];
$time = $_POST['time'];
$formatedTime = date('H:i:s', strtotime($time));
$reasonForCall = $_POST['reasonForCall'];
$operatorID = $_POST['operatorID'];

$problems = $_POST['problems'];

$callData = [ 2, $callerName, $extension, $date, $formatedTime, $reasonForCall, $operatorID ];
$callSQL = "INSERT INTO `Call` (`CallID`, `Name`, `Ext`, `Date`, `Time`, `ReasonForCall`, `ID`) VALUES (?, ?, ?, ?, ?, ?, ?)";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $db->prepare($callSQL)->execute($callData);
  
  $output = array();
  foreach($db->query("SELECT * FROM `$callTable`") as $row) {
    print_r($row);
    $row = array("callerName" => $row['Name']);
    array_push($output, $row);
  }
  echo json_encode($output);


} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}





// Get Post data x
// Get each value (Create Call Object & Problem object for each problem) x
// Insert Call Obj then get back Primary Key
// Insert all problem objects (which aren't just problem no.) then get back Primary Key
// Create a problemNo Array and add problem no. of posted extsting problems + new retreived Primary Keys
// Insert into CallProblem table (Under contstraint that every pair of foreign keys are UNIQUE)

?>