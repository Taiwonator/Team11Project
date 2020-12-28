<?php
$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "ProblemType";
try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  echo "<h2>Problem Types</h2><ol>";
  foreach($db->query("SELECT 'ProblemType' FROM $table") as $row) {
    echo "<li>" . $row . "</li>";
  }
  echo "</ol>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>