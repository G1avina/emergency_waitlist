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
            $nom = $data_array['nom'];
            $prenom = $data_array['prenom'];
            $email = $data_array['email'];
            $age = $data_array['age'];
            $pass = $data_array['password'];

            //check if pass or user is empty
            if($id == "" || strlen($id) !=3){
                $data = ["error" => "Enter a valid id an id should be 3 character long"];
                header("Content-Type: application/json");
                http_response_code(200); // Bad
                logf("user field empty");
                echo json_encode($data);
                exit;

            }else if($nom == ""){
                $data = ["error" => "Enter a nom"];
                header("Content-Type: application/json");
                http_response_code(200); // Bad
                logf("user field empty");
                echo json_encode($data);
                exit;

            }else if($prenom == ""){
                $data = ["error" => "Enter a prenom"];
                header("Content-Type: application/json");
                http_response_code(200); // Bad
                logf("user field empty");
                echo json_encode($data);
                exit;

            }else if($email == ""){
                $data = ["error" => "Enter a email"];
                header("Content-Type: application/json");
                http_response_code(200); // Bad
                logf("user field empty");
                echo json_encode($data);
                exit;

            }else if($age == "" || !ctype_digit($age) ){
                $data = ["error" => "Enter a valid age"];
                header("Content-Type: application/json");
                http_response_code(200); // Bad
                logf("age field empty");
                echo json_encode($data);
                exit;
            }else if($pass == "" ){
                $data = ["error" => "Enter a password"];
                header("Content-Type: application/json");
                http_response_code(200); // Bad
                logf("password field empty");
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

  
    //database
    $query = "SELECT * FROM admin WHERE idadmin = $1";
    $result = pg_query_params($conn, $query, array($id));

    if ($result) {
        if (pg_num_rows($result) == 0) {
            pg_free_result($result);
        }
        else{
            logf("admin id already in");
            pg_free_result($result);
            $data = ["error" => "admin id already in use pick a new unique id"];
            header("Content-Type: application/json");
            http_response_code(200); // Bad Request
            echo json_encode($data);
            exit;
        }
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

   $query = "INSERT INTO admin (IDadmin,nom,prenom,email,age,password) VALUES ($1,$2,$3,$4,$5,$6);";
    $result = pg_query_params($conn, $query, array($id,$nom,$prenom,$email,$age,$pass));
   

    if ($result) {
        logf("admin inserted");
        pg_free_result($result);
        $data = ["error" => "admin inserted"];
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