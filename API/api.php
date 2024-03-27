<?php
require_once('../Database/database.php');
require_once('apiFunction.php');

switch ($_GET["action"] ?? "version") {
case "test":
  // Get the raw POST data
  $json_data = file_get_contents('php://input');
  // Decode the JSON data into a PHP array
  $data_array = json_decode($json_data, true);

    $data ["answer"] = ["smt"];


    //database test
    $result = pg_query($conn, "SELECT * FROM test");

    // Fetch and display the results
    $i = 1;
    while ($row = pg_fetch_assoc($result)) {
        $data["Column$i"] = [$row["name"]];
        $i++;
    }

    // Free result set
    pg_free_result($result);


break;

//Someone wants to login

case "login":
    // Get the raw POST data
    $json_data = file_get_contents('php://input');
    // Decode the JSON data into a PHP array
    $data_array = json_decode($json_data, true);
  
    $user = $data_array['username'];
  
  
    //database test
    $query = "SELECT password FROM test WHERE name = $1";
    $result = pg_query_params($conn, $query, array($user));

    if ($result) {
        if (pg_num_rows($result) == 0) {
            logf("no rows");
            pg_free_result($result);
            testGoBackLogin();
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
    if ($row["password"] == $data_array['password']){
        logf("password match");
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
break;

default:
    $data = ["version" => "1.0"];
}

header("Content-Type: application/json");
echo json_encode($data);