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
            // Process the data as needed
            // For example, you can access individual fields like this:
            $user = $data_array['username'];
            $pass = $data_array['password'];
            logf($user);
            logf($pass);
        
        } else {
            // Decoding failed
            http_response_code(400); // Bad Request
            echo "Error: Invalid JSON data received.";
            logf("Error: Invalid JSON data received.");
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

  
    //database test
    $query = "SELECT password FROM test WHERE name = $1";
    $result = pg_query_params($conn, $query, array($user));

    if ($result) {
        if (pg_num_rows($result) == 0) {
            //logf("no rows");
            pg_free_result($result);
            //testGoBackLogin();
            //exit;

            http_response_code(400); // Bad Request
            echo "No matching rows";
            logf("No matching rows");
            exit;





        }
        $row = pg_fetch_assoc($result);
    }else{
        logf("query error");
        pg_free_result($result);
        testGoBackLogin();
        exit;
    }

    //check password
    if ($row["password"] == $pass){
        logf("password match");

        $_SESSION['username'] = $user;
        $_SESSION['connected'] = "yes";
        pg_free_result($result);
        header("HTTP/1.1 301 Found");
        header("Location: ../Frontend/adminPage.php");
        exit;
    }else{  
        logf("no password match");
        pg_free_result($result);
        testGoBackLogin();
        exit;
    }
