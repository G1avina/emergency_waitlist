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
            $nom = $data_array['nom'];
            $prenom = $data_array['prenom'];
            $age = $data_array['age'];
            $desc = $data_array['desc'];
            $niv = $data_array['niv'];

            //check if pass or user is empty
            if($nom == ""){
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

            }else if($age == "" || !ctype_digit($age) ){
                $data = ["error" => "Enter a valid age"];
                header("Content-Type: application/json");
                http_response_code(200); // Bad
                logf("age field empty");
                echo json_encode($data);
                exit;
            }else if($desc == ""){
                $data = ["error" => "Enter a email"];
                header("Content-Type: application/json");
                http_response_code(200); // Bad
                logf("description field empty");
                echo json_encode($data);
                exit;
            }else if($niv == "" || !ctype_digit($niv)||$niv<1||$niv>10){
                $data = ["error" => "Enter a valide level it must be a number from 1 to 10"];
                header("Content-Type: application/json");
                http_response_code(200); // Bad
                logf("niveau field empty");
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
//need to insert stuff

  
    //database test
   /* $query = "SELECT * FROM admin WHERE idadmin = $1";
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
*/
   $query = "INSERT INTO patient (nom,prenom,age,blessure_description,blessure_niveau,temps_enregistrer,queue,IDadmin) VALUES ($1,$2,$3,$4,$5,CURRENT_TIME::TIME(0),99,$6);";
    $result = pg_query_params($conn, $query, array($nom,$prenom,$age,$desc,$niv,$_SESSION["username"]));
   

    if ($result) {
        logf("Patient inserted");
        pg_free_result($result);
        $data = ["error" => "patient inserted"];
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