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
fputcsv($output, array( 'ProblemNumber', 'Status', 'Branch ID', 'In Person', 'Priority', 'Problem Description', 'OS',
                      'Software Name', 'Serial Number', 'Date Solved', 'Time Solved', 'Solve Method', 'Solve Notes',
                      'Problem Type', 'ID', 'External ID'));

// fetch the data


mysql_connect('localhost', $user , $password) or die (mysql_error());
mysql_select_db($database) or die (mysql_error());
$rows = mysql_query('SELECT * FROM Problem');

// loop over the rows, outputting them
while ($row = mysql_fetch_assoc($rows)) {
  fputcsv($output, $row);
}


?>
