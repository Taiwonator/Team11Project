<?php


//include '../../includes/connect.php';

// The message
$message = "Testing\r\nTesting\r\n123";

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70, "\r\n");

// Send
mail('bradleymaxwell12@gmail.com', 'test email', $message);


// general concept: find every unsolved problem and send an email reminding them that they have not confirmed the problem as solved.
// need to learn how to debug a PHP file, especially in this case where im working with a database
