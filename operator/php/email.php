<?php

include '../../includes/connect.php'; //connect to database

$link = "Problem.ProblemNumber = CallProblem.ProblemNumber AND
        Call.CallID = CallProblem.CallID AND 
        Call.Name = PersonnelID.Name AND Call.Ext = PersonnelID.Ext AND
        PersonnelID.ID = Personnel.ID"; // traverse through the relational database from where the unsolved problems are to where the emails can be found
        
$sql = "SELECT Email,ProblemNumber FROM Personnel,PersonnelID,Call,CallProblem,Problem WHERE Problem.Status = 'unsolved' AND $link"; // return email linked to calls where the problems have not been solved yet

$result = $conn->query($sql); //$conn should be defined in connect.php, if not then change variable name to whatever is in connect.php

if ($result->num_rows > 0) {
    while ($record = $result->fetch_assoc()) {
        $message = "Your problem referencing Problem ID: " . $result['ProblemNumber'] . " is still marked as unsolved. Please contact the helpdesk to confirm if your problem has been solved.\n\nMake-it-All Helpdesk";
        mail($record['email'],'Unsolved problem check up',$message);
    }
}

// general concept: find every unsolved problem and send an email reminding them that they have not confirmed the problem as solved.
