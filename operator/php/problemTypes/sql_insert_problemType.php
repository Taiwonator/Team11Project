<?php
$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";
$table = "ProblemType";

$problemType = $_POST['problemType'];
$data = [ 'problemType' => $problemType ];
$sql = "INSERT INTO ProblemType (ProblemType) VALUES (:problemType)";

try {
  print_r('Hello1');
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  print_r('Hello2');
  $db->prepare($sql)->execute($data)
  print_r('Hello3');

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>