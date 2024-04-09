<?php
require_once('../Database/database.php');
require_once('apiFunction.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the Content-Type header indicates JSON data
    if ($_SERVER['CONTENT_TYPE'] === 'application/json') {
        // Read the raw POST data
        $json_data = file_get_contents('php://input');

        // Attempt to decode the JSON data
        $data_array = json_decode($json_data, true);

        // Check if decoding was successful
        if ($data_array !== null) {
            // JSON data was successfully decoded
            $id = $data_array['id'];
    
            
        
        } else {
            // Decoding failed
           $data = ["error" => "Fields are empty"];
            header("Content-Type: application/json");
            http_response_code(200); // Bad
            logf("Error: Invalid JSON data received.");
            echo json_encode($data);
            exit;
        }
    } else {
        // Content-Type is not JSON
        http_response_code(400); // Bad Request
        echo "Error: Content-Type must be application/json.";
        logf("Error: Content-Type must be application/json.");
        exit;
    }
} else {
    // Request method is not POST
    http_response_code(405); // Method Not Allowed
    echo "Error: Only POST requests are allowed.";
    logf( "Error: Only POST requests are allowed.");
    exit;
}







//------------------------------------------------------------------------------------------------------
//need to insert stuff

  
    //database test
    $query = "DELETE FROM patient WHERE idpatient = $1";
    $result = pg_query_params($conn, $query, array($id));

    if ($result) {
        logf("Patient deleted");
        pg_free_result($result);
        $data = ["error" => "patient deleted"];
        header("Content-Type: application/json");
        http_response_code(200); // Bad Request
        echo json_encode($data);
        exit;
        
    }else{
        logf("query error");
        //pg_free_result($result);

        $data = ["error" => "querry error"];
        header("Content-Type: application/json");
        http_response_code(200); // Bad Request
        echo json_encode($data);
        logf(json_encode($data));

        exit;
    }