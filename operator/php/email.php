<?php

include "../../includes/connect.php";

$link = "Problem.ProblemNumber = CallProblem.ProblemNumber AND
        `Call`.CallID = CallProblem.CallID AND 
        `Call`.Name = Personnel_ID.Name AND `Call`.Ext = Personnel_ID.Ext AND
        Personnel_ID.ID = Personnel.ID"; // traverse through the relational database from where the unsolved problems are to where the emails can be found
        
$sql = "SELECT DISTINCT Problem.ProblemNumber,Email FROM Personnel,Personnel_ID,`Call`,CallProblem,Problem WHERE Problem.Status = 'unsolved' AND $link"; // return email linked to calls where the problems have not been solved yet

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($record = $result->fetch_assoc()) {
        $message = "Your problem referencing Problem ID: " . $result['ProblemNumber'] . " is still marked as unsolved. Please contact the helpdesk to confirm if your problem has been solved.\n\nMake-it-All Helpdesk";
        //mail($record['Email'],'Unsolved problem check up',$message);
        echo "Email sent to " . $record['Email'] . " about problem " . $record[ProblemNumber];
    }
}

