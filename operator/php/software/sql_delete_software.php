<?php
// FINAL PHP FUNCTION 
//Deleting Software    
    
$_POST = json_decode(file_get_contents('php://input'), true);

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Software";

$softwareName = $_POST["softwareName"];
$data = [ "softwareName" => $softwareName ];
$sql = "DELETE FROM $table WHERE Software.SoftwareName = :softwareName";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->prepare($sql)->execute($data);

  $output = array();
  // foreach($db->query("SELECT * FROM $table") as $row) {
  //   $row = array("softwareName"=>$row['SoftwareName'], "licensed"=>$row['Licensed'], "supported"=>$row['Supported'],);
  //   array_push($output, $row);
  // }
  echo json_encode($output);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
<?
