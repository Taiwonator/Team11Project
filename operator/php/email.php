<?php


include '../../includes/connect.php';

$email = "bradleymaxwell12@gmail.com";
$message = "testing testing 123";

mail($email,'Unsolved problem check up',$message);


// general concept: find every unsolved problem and send an email reminding them that they have not confirmed the problem as solved.
// need to learn how to debug a PHP file, especially in this case where im working with a database
