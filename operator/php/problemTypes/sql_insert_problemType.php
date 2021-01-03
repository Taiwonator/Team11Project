<?php
$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "ProblemType";

$problemType = $_POST["problemType"];
$data = [ "problemType" => $problemType ];
$sql = "INSERT INTO ProblemType (ProblemType) VALUES (:problemType)";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  $db->prepare($sql)->execute($data);

  
  foreach ($_POST as $key => $value) {
    echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>" . $data[0];
  }

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>