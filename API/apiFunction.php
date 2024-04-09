<?php
require_once('../Database/database.php');

//----------------
//THIS FILE WAS USED FOR TESTING PURPOSES PLS IGNORE
//-----------------

//something fails in login
function testGoBackLogin(){
    header("HTTP/1.1 301 Found");
    header("Location: ../Frontend/login.php");
}

//Logs text in logfile.txt used for troubleshoot purposes
function logf($log){
    file_put_contents('logfile.txt', $log . PHP_EOL,FILE_APPEND);
}

function sendError($message){

    $data = ["error" => $message];
    // Bad
    echo json_encode($data);

}

/*
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

        // Convert PostgreSQL time string to DateTime object
        $starTime = DateTime::createFromFormat('H:i:s', $postStartTime);

        // Get the current PHP time as a DateTime object
        $currentDateTime = new DateTime();

        // Calculate the difference between the PostgreSQL time and current time
        $timeDifference = $currentDateTime->diff($starTime);

        // Calculate the total number of seconds in the time difference
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

}*/



//sortPatient();