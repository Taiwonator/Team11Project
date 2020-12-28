<?php
$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "Personnel";
try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  echo "<h2>Personnel</h2><ol>";
  foreach($db->query("SELECT '*' FROM $table") as $row) {
    echo "<li>" . $row['ID'] . $row['JobTitle'] . $row['Dept'] . $row['Email'] . $row['BranchID'] . "</li>";
  }
  echo "</ol>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>