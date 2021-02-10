<?php
$_POST = json_decode(file_get_contents('php://input'), true);

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Equipment";

$serialNumber = $_POST["serialNumber"];
$type = $_POST["type"];
$make = $_POST["make"];

$data = [ "serialNumber" => $serialNumber, "type" => $type, "make" => $make ];
$sql = "INSERT INTO $table (SerialNumber, Type, Make) VALUES (:serialNumber, :type, :make)";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $db->prepare($sql)->execute($data);

  $output = array();
  foreach($db->query("SELECT * FROM $table") as $row) {
    $row = array("serialNumber"=>$row['SerialNumber'], "type"=>$row['Type'], "make"=>$row['Make']);
    array_push($output, $row);
  }
  echo json_encode($output);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>