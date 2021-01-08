<?php
$_POST = json_decode(file_get_contents('php://input'), true);

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";

$obj = $_POST["callerName"];
$problems = $_POST["problems"];
echo $problems;
// $data = [ "problemType" => $problemType ];
// $sql = "INSERT INTO $table (ProblemType) VALUES (:problemType)";

// try {
//   $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
//   $db->prepare($sql)->execute($data);

//   $output = array();
//   foreach($db->query("SELECT * FROM $table") as $row) {
//     $row = array("problemType"=>$row['ProblemType']);
//     array_push($output, $row);
//   }
//   echo json_encode($output);

// } catch (PDOException $e) {
//     print "Error!: " . $e->getMessage() . "<br/>";
//     die();
// }





// Get Post data
// Get each value (Create Call Object & Problem object for each problem)
// Insert Call Obj then get back Primary Key
// Insert all problem objects (which aren't just problem no.) then get back Primary Key
// Create a problemNo Array and add problem no. of posted extsting problems + new retreived Primary Keys
// Insert into CallProblem table (Under contstraint that every pair of foreign keys are UNIQUE)

?>