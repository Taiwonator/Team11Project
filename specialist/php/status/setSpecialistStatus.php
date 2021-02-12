<?php

$specialistID = intval($_GET['ID']);
$status = $_GET["status"];
$servername = "35.189.96.25";
$db = "helpdesk_database";
$username = "pma";
$password = "webproject@Team11";
try {
  $db = mysqli_connect("$servername",$username,$password,$db) or die("Bad Connect:".mysqli_connect_error());
  $status = $_GET["status"];
  $sqlQuery = "UPDATE Specialist SET Status = $status WHERE ID = $specialistID";
  $db->query($sqlQuery);
  $db->close();

} catch (Exception $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>