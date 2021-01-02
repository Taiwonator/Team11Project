<?php
$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Software";
try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $output = array();
  foreach($db->query("SELECT * FROM $table") as $row) {
    $row = array($row['SoftwareName'], $row['Licensed'], $row['Supported']);
    push_array($output, $row);
    // echo "<li>" . $row['SoftwareName'] . $row['Licensed'] . $row['Supported'] . "</li>";
    // print_r($row);
  }
  echo $output;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>