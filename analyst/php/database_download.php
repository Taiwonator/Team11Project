<?php


$database = "helpdesk_database";



echo("File running");

header('Content type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array( 'ProblemNumber', 'Status', 'Branch ID', 'In Person', 'Priority', 'Problem Description', 'OS',
                      'Software Name', 'Serial Number', 'Date Solved', 'Time Solved', 'Solve Method', 'Solve Notes',
                      'Problem Type', 'ID', 'External ID'));

// fetch the data

mysqli_connect('localhost', $user , $password);
mysqli_select_db($database);
$rows = mysqli_query('SELECT * FROM Problem');

// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rows)) fputcsv($output, $row);


?>
