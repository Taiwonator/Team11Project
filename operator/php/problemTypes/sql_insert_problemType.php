<?php
$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "ProblemType";

$problemType = $_POST["problemType"];
$data = [ "problemType" => $problemType ];
$sql = "INSERT INTO $table (ProblemType) VALUES (:problemType)";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $db->prepare($sql)->execute($data);
  // print_r(_$SERVER);
  echo "Data: " . $_REQUEST;

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>