<?php

$user = $_POST['user'];
$result = "";
if($user == 'operator') {
    $result = "Hello operator, here are ALL the problems";
} else if ($user == 'specialist') {
    $result = "Hello specialist, here are YOUR problems";
} else {
    $result = "Who?";
}
 
echo($result);

?>