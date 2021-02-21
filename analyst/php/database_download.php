<?php

$user = "pma";
$password = "webproject@Team11";
$database = "helpdesk_database";



echo("File running");

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('Column 1', 'Column 2', 'Column 3'));

// fetch the data


mysqli_connect('localhost', $user , $password);
mysqli_select_db($database);
$rows = mysqli_query('SELECT * FROM Problem');

// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rows)) fputcsv($output, $row);


?>
