// ********* Old format ********

<?php

    $serialNum = intval($_GET['SerialNumber']);
    
    $servername = "35.189.96.25";
	$db = "helpdesk_database";
	$username = "pma";
	$password = "webproject@Team11";

	$conn = mysqli_connect("$servername",$username,$password,$db) or die("Bad Connect:".mysqli_connect_error());
    
    $sql = "SELECT `SerialNumber`, `Type`, `Make`";
    $sql. = "FROM Equipment WHERE `SerialNumber` = '$serialNum'";
    
    $res = $conn->query($sql);
	
	$conn->close();
?>

// ************* Changed format *********

<?php
$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Equipment";
try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
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
