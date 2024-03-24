<?php

switch ($_GET["action"] ?? "version") {
case "test":
  // Get the raw POST data
  $json_data = file_get_contents('php://input');
  // Decode the JSON data into a PHP array
  $data_array = json_decode($json_data, true);

    $data = ["answer" => "smt"];


break;

default:
    $data = ["version" => "1.0"];
}

header("Content-Type: application/json");
echo json_encode($data);