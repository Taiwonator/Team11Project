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

$callData = [ $callerName, $extension, $date, $formatedTime, $reasonForCall, $operatorID ];
$callSQL = "INSERT INTO `Call` (`Name`, `Ext`, `Date`, `Time`, `ReasonForCall`, `ID`) VALUES (?, ?, ?, ?, ?, ?)";

$problemNumbers = array();
foreach($problems as $problem) {
  if(count(array_keys($problem)) == 1) {
    array_push($problemNumbers, (int)$problem['problemNumber']);
  }
}
// print_r($problemNumbers);


try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->prepare($callSQL)->execute($callData);
  $callID = $db->lastInsertId();


  foreach($problems as $problem) {
    if(count(array_keys($problem)) != 1) {
      $problemData = [ getAttr($problem, 'OS'), 
                       getAttr($problem, 'branch'), 
                       getAttr($problem, 'externalSpecialistID'), 
                       getAttr($problem, 'inPerson'), 
                       getAttr($problem, 'priority'), 
                       getAttr($problem, 'problemDescription'), 
                       getAttr($problem, 'problemType'), 
                       getAttr($problem, 'serialNumber'), 
                       getAttr($problem, 'softwareName'), 
                       getAttr($problem, 'solveMethod'), 
                       getAttr($problem, 'solveNotes'), 
                       getAttr($problem, 'specialistID'), 
                       getAttr($problem, 'status'),
                       getAttr($problem, 'dateSolved'), 
                       date('H:i:s', strtotime(getAttr($problem, 'timeSolved'))) ];
      print_r($problemData);

      $problemSQL = "INSERT INTO `Problem` (`OS`, `BranchID`, `ExternalID`, `InPerson`, `Priority`, `ProbDescription`, `ProblemType`, `SerialNumber`, `SoftwareName`, `SolveMethod`, `SolveNotes`, `ID`, `Status`, `DateSolved`, `TimeSolved`) 
                     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; 

      $db->prepare($problemSQL)->execute($problemData);
      $problemID = $db->lastInsertId();
      array_push($problemNumbers, $problemID);
    }
  }
  print_r($problemNumbers);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

function getAttr($problem, $attribute) {
  $value = $problem[$attribute];
  if($value == "") {
    print_r($attribute);
    return "NULL";
  } else {
    if(is_numeric($value)) {
      return (int)$value;
    } else {
      return $value;
    }
  }
}





// Get Post data x
// Get each value (Create Call Object & Problem object for each problem) x
// Insert Call Obj then get back Primary Key
// Insert all problem objects (which aren't just problem no.) then get back Primary Key
// Create a problemNo Array and add problem no. of posted extsting problems + new retreived Primary Keys
// Insert into CallProblem table (Under contstraint that every pair of foreign keys are UNIQUE)

// Priority: I don't know
// OS: Doesn't require OS

?>