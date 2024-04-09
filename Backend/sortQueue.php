<?php 
//THIS FILE HAS A FUNCTION THAT SORTS THE PATIIENT QUEUE IT USES TIME REGISTRED AND LEVEL OF INJURY TO ORDER THE QUEUE
require_once('../Database/database.php');

function sortPatient(){
    global $conn;


    $query = "SELECT * FROM patient";
    $result = pg_query($conn, $query);
    
    
    if (!$result) {
        echo "An error occurred.\n";
        exit;
    }
    
    $rows = pg_fetch_all($result);
            
            
    $dictionary = array();

    foreach ($rows as $row) {
        $postStartTime = $row['temps_enregistrer'];
        $level = $row['blessure_niveau'];
        $id = $row['idpatient'];

        $starTime = DateTime::createFromFormat('H:i:s', $postStartTime);

        $currentDateTime = new DateTime();


        $timeDifference = $currentDateTime->diff($starTime);

  
        $totalSeconds = $timeDifference->s + $timeDifference->i * 60 + $timeDifference->h * 3600;

        $score = $totalSeconds * $level;

        $dictionary["$id"] = $score;
    }

    arsort($dictionary);

    $i = 1;
    foreach ($dictionary as $key => $value) {

        $query = "UPDATE patient SET queue = $1 WHERE idpatient = $2";
        $result = pg_query_params($conn, $query, array($i, $key));
        $i = $i+1;
    }

}



sortPatient();