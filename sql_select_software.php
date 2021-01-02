<?php
$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Software";
try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  echo "<h2>Software</h2><ol>";
  foreach($db->query("SELECT * FROM $table") as $row) {
    echo "<li>" . $row['SoftwareName'] . $row['Licensed'] . $row['Supported'] . "</li>";
    print_r($row);
  }
  echo "</ol>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>