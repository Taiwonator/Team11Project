<?php


$database = "helpdesk_database";
$user = 'pma';
$password = "webproject@Team11";
$table = 'Problem';


header('Content type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array( 'ProblemNumber', 'Status', 'Branch ID', 'In Person', 'Priority', 'Problem Description', 'OS',
                      'Software Name', 'Serial Number', 'Date Solved', 'Time Solved', 'Solve Method', 'Solve Notes',
                      'Problem Type', 'ID', 'External ID'));

// fetch the data

$mysqli = new mysqli("localhost","my_user","my_password","my_db");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$sql = "SELECT * FROM Problem";
$result = $mysqli -> query($sql);

// loop over the rows, outputting them
while ($row = $result -> fetch_assoc()) fputcsv($output, $row);

// Free result set
$result -> free_result();

$mysqli -> close();

?>
