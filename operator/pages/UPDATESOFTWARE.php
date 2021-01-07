//************ Old format *********************

<?php

    $softwareName = $_GET['SoftwareName'];
    $newLicensed = intval($_GET['Licensed']);
    $newSupported = intval($_GET['Supported']);
    
    $servername = "35.189.96.25";
	$db = "helpdesk_database";
	$username = "pma";
	$password = "webproject@Team11";

	$conn = mysqli_connect("$servername",$username,$password,$db) or die("Bad Connect:".mysqli_connect_error());
    
    $sql = "UPDATE Software SET `Licensed` = '$newLicensed', `Supported` = '$newSupported' WHERE `SoftwareName` = '$softwareName'";
    
    $res = $conn->query($sql);
	
	$conn->close();
?>



//***************** Changed format ***************

//probably being silly but wasn't sure if i could combine these two into just one php function

<?php

//updating License in Software Table

$_POST = json_decode(file_get_contents('php://input'), true);

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Software";

$oldLicense = $_POST["oldLicense"];
$newLicense = $_POST["newLicense"];

$data = [ "oldLicense" => $oldLicense, "newLicense" => $newLicense ];
$sql = "UPDATE $table SET License = :newLicense WHERE Software.License = :oldLicense";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $db->prepare($sql)->execute($data);

  $output = array();
  foreach($db->query("SELECT * FROM $table") as $row) {
    $row = array("Licensed"=>$row['Licensed']);
    array_push($output, $row);
  }
  echo json_encode($output);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
<?

<?php

//updating Supported on Software Table    
    
$_POST = json_decode(file_get_contents('php://input'), true);

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Software";

$oldSupport = $_POST["oldSupport"];
$newSupport = $_POST["newSupport"];

$data = [ "oldSupport" => $oldSupport, "newSupport" => $newSupport ];
$sql = "UPDATE $table SET Supported = :newSupport WHERE Software.Supported = :oldSupport";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $db->prepare($sql)->execute($data);

  $output = array();
  foreach($db->query("SELECT * FROM $table") as $row) {
    $row = array("Supported"=>$row['Supported'],);
    array_push($output, $row);
  }
  echo json_encode($output);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
<?
<?php

//updating Licensed & Supported on Software Table    
    
$_POST = json_decode(file_get_contents('php://input'), true);

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Software";

$oldLicense = $_POST["oldLicense"];
$newLicense = $_POST["newLicense"];
$oldSupport = $_POST["oldSupport"];
$newSupport = $_POST["newSupport"];

$data = [ "oldLicense" => $oldLicense, "newLicense" => $newLicense, "oldSupport" => $oldSupport, "newSupport" => $newSupport ];
$sql = "UPDATE $table SET License = :newLicense, Supported = :newSupport WHERE Software.License = :oldLicense AND Software.Supported = :oldSupport";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $db->prepare($sql)->execute($data);

  $output = array();
  foreach($db->query("SELECT * FROM $table") as $row) {
    $row = array("softwareName"=>$row['SoftwareName'], "Licensed"=>$row['Licensed'], "Supported"=>$row['Supported'],);
    array_push($output, $row);
  }
  echo json_encode($output);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
<?
