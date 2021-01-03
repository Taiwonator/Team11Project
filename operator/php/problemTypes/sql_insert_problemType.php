<?php
$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "ProblemType";

$problemType = $_POST["problemType"];
$data = [ "problemType" => $problemType ];
$sql = "INSERT INTO ProblemType (ProblemType) VALUES (:problemType)";

foreach ($_POST as $key => $value) {
  echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
}

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $db->prepare($sql)->execute($data);
  echo "insertion in php executed" . $problemType . $data . $sql;

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>