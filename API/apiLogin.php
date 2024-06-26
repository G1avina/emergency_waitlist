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
            $user = $data_array['username'];
            $pass = $data_array['password'];

            //check if pass or user is empty
            if($user == ""){
                $data = ["error" => "Enter a username"];
                header("Content-Type: application/json");
                http_response_code(200); // Bad
                logf("user or password field empty");
                echo json_encode($data);
                exit;

            }else if($pass == "" ){
                $data = ["error" => "Enter a password"];
                header("Content-Type: application/json");
                http_response_code(200); // Bad
                logf("user or password field empty");
                echo json_encode($data);
                exit;
            }
        
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

  
    //database test

    //querry admin
    $query = "SELECT password FROM admin WHERE idadmin = $1";
    $result = pg_query_params($conn, $query, array($user));
    $isPatient = 0;

    if ($result) {
        //if not an admin check for patient
        if (pg_num_rows($result) == 0) {
            pg_free_result($result);
            $query = "SELECT idpatient FROM patient WHERE nom = $1";
            $result = pg_query_params($conn, $query, array($user));

            if ($result) {
                if (pg_num_rows($result) == 0) {
                    //logf("no rows");
                    pg_free_result($result);
                    //testGoBackLogin();
                    //exit;
                    logf("No matching rows");
                    header("Content-Type: application/json");
                    http_response_code(200); 
                    $data = ["error" => "Account doesnt exist"];
                    echo json_encode($data); 
                    exit;}else{  $isPatient = 1; } 
            }else{
                logf("query error");
                //pg_free_result($result);
        
                $data = ["error" => "Querry error"];
                header("Content-Type: application/json");
                http_response_code(200); // Bad Request
                echo json_encode($data);
                exit;
            }
        }
    }else{
        logf("query error");
        pg_free_result($result);

        $data = ["error" => "Querry error"];
        header("Content-Type: application/json");
        http_response_code(200); // Bad Request
        echo json_encode($data);
        exit;
    }

    $row = pg_fetch_assoc($result);


    if($isPatient ==1){
        if ($row["idpatient"] == $pass){
            logf("password match");
    
            $_SESSION['username'] = $user;
            $_SESSION['connected'] = "patient";
            pg_free_result($result);
            header("HTTP/1.1 301 Found");
            header("Location: ../Frontend/patientPage.php");
            exit;
        }else{  
            logf("no password match");
            pg_free_result($result);
            //testGoBackLogin();
            $data = ["error" => "Wrong password"];
            header("Content-Type: application/json");
            http_response_code(200); // Bad Request
            echo json_encode($data);
            exit;
        }
    }

    //check password
    if ($row["password"] == $pass){
        logf("password match");

        $_SESSION['username'] = $user;
        $_SESSION['connected'] = "admin";
        pg_free_result($result);
        header("HTTP/1.1 301 Found");
        header("Location: ../Frontend/adminPage.php");
        exit;
    }else{  
        logf("no password match");
        pg_free_result($result);
        //testGoBackLogin();
        $data = ["error" => "Wrong password"];
        header("Content-Type: application/json");
        http_response_code(200); // Bad Request
        echo json_encode($data);
        exit;
    }
