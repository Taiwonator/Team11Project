<?php
$_POST = json_decode(file_get_contents('php://input'), true);

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Software";

$softwareName = $_POST["softwareName"];
$licensed = $_POST["licensed"];
$supported = $_POST["supported"];

$data = [ "softwareName" => $softwareName, "licensed" => $licensed, "supported" => $supported ];
$sql = "INSERT INTO $table (SoftwaresoftwareName, Licensed, Supported) VALUES (:softwareName, :licensed, :supported)";

try {
  $db = new PDO("mysql:host=localhost;dbsoftwareName=$database", $user, $password);
  $db->prepare($sql)->execute($data);

  $output = array();
  foreach($db->query("SELECT * FROM $table") as $row) {
    $row = array("softwaresoftwareName"=>$row['SoftwaresoftwareName'], "licensed"=>$row['Licensed'], "supported"=>$row['Supported']);
    array_push($output, $row);
  }
  echo json_encode($output);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>