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
$reasonForCall = $_POST['reasonForCall'];
$operatorID = $_POST['operatorID'];

$problems = $_POST['problems'];

$callData = [ "callerName" => $extension, "extension" => $callerName, "date" => $date, "time" => $time, "reasonForCall" => $reasonForCall, "operatorID" => $operatorID ];
$callSQL = "INSERT INTO $callTable (Name, Ext, Date, Time, ReasonForCall, operatorID) VALUES (:callerName, :extension, :date, :time, :reasonForCall, :operatorID)";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $db->prepare($callSQL)->execute($callData);
  
  $output = array();
  foreach($db->query("SELECT * FROM $table") as $row) {
    $row = array("callerName"=>$row['Name']);
    array_push($output, $row);
  }
  echo json_encode($output);

  // $output = array();
  // foreach($db->query("SELECT * FROM $table") as $row) {
  //   $row = array("problemType"=>$row['ProblemType']);
  //   array_push($output, $row);
  // }
  // echo json_encode($output);

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