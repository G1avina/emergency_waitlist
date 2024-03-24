<?php
require_once('database.php');

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

default:
    $data = ["version" => "1.0"];
}

header("Content-Type: application/json");
echo json_encode($data);