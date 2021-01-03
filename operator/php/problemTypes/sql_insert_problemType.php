<?php
$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "ProblemType";

$problemType = $_POST["problemType"];
$data = [ "problemType" => $problemType ];
$sql = "INSERT INTO $table (ProblemType) VALUES (:problemType)";

print_r($_REQUEST);
echo "Data: " . $_REQUEST;

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $db->prepare($sql)->execute($data);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>