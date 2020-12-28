<?php
$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Branch";
try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  echo "<h2>Branches</h2><ol>";
  foreach($db->query("SELECT * FROM $table") as $row) {
    echo "<li>" . $row['BranchID'] . $row['BranchName'] . $row['City'] . $row['Country'] . $row['Telephone'] . "</li>";
    print_r($row);
  }
  echo "</ol>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>