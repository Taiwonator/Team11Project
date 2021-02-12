<?php

$problemNum = intval($_GET['ProblemNumber']);
$servername = "35.189.96.25";
$db = "helpdesk_database";
$username = "pma";
$password = "webproject@Team11";
try {
  $db = mysqli_connect("$servername",$username,$password,$db) or die("Bad Connect:".mysqli_connect_error());
  $sqlQuery = "UPDATE Problem SET Status = 'pending' WHERE ProblemNumber = $problemNum";
  $db->query($sqlQuery);
  $db->close();

} catch (Exception $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>