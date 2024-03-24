<?php
//this shit needs to be completely redesigned
//I want to implement jquerry and maybe even a REST api



require_once('_config.php');
require_once('../app/models/YatzyEngine.php');
require_once('../app/models/YatzyGame.php');

use yatzy\Dice;
use yatzy\Engine;
use yatzy\Game;

session_start();
//session_unset();

switch ($_GET["action"] ?? "version") {
case "roll":

  // Get the raw POST data
  $json_data = file_get_contents('php://input');
  // Decode the JSON data into a PHP array
  $data_array = json_decode($json_data, true);

  $gameImage = new Game($data_array);
    $gameImage->rollDice();
    $gameImage->calcScore();
    $gameImage->calcState("roll");
    $gameImage->checkEnd();
    

    $data = $gameImage->createJson();


break;



case "score":
  // Get the raw POST data
  $json_data = file_get_contents('php://input');
  // Decode the JSON data into a PHP array
  $data_array = json_decode($json_data, true);
  $gameImage = new Game($data_array);
  $gameImage->calcScore();
  $gameImage->calcState("score");
  $gameImage->checkEnd();
  $data = $gameImage->createJson();



break;

case "leaderboard":
  $json_data = file_get_contents('php://input');
  $data_array = json_decode($json_data, true);

  if (isset($_SESSION['playerName1'])) {
    }else {
      $_SESSION['playerName1'] = $data_array["playerName"];
      $_SESSION['score1'] = $data_array["total"];
      break;}

  if (isset($_SESSION['playerName2'])) {
  }else {
        $_SESSION['playerName2'] = $data_array["playerName"];
        $_SESSION['score2'] = $data_array["total"];
        break;}


  if (isset($_SESSION['playerName3'])) {
  }else {
        $_SESSION['playerName3'] = $data_array["playerName"];
        $_SESSION['score3'] = $data_array["total"];
        break;}


  if (isset($_SESSION['playerName4'])) {
  }else {
      $_SESSION['playerName4'] = $data_array["playerName"];
      $_SESSION['score4'] = $data_array["total"];
      break;}


    if (isset($_SESSION['playerName5'])) {
    }else {
      $_SESSION['playerName5'] = $data_array["playerName"];
      $_SESSION['score5'] = $data_array["total"];
      break;}


      if (isset($_SESSION['playerName6'])) {
      }else {
        $_SESSION['playerName6'] = $data_array["playerName"];
        $_SESSION['score6'] = $data_array["total"];
        break;}

        if (isset($_SESSION['playerName7'])) {
        }else {
          $_SESSION['playerName7'] = $data_array["playerName"];
          $_SESSION['score7'] = $data_array["total"];
          break;}


          if (isset($_SESSION['playerName8'])) {
        }else {
          $_SESSION['playerName8'] = $data_array["playerName"];
          $_SESSION['score8'] = $data_array["total"];
          break;}

          if (isset($_SESSION['playerName9'])) {
          }else {
            $_SESSION['playerName9'] = $data_array["playerName"];
            $_SESSION['score9'] = $data_array["total"];
            break;}

            if (isset($_SESSION['playerName10'])) {
            }else {
              $_SESSION['playerName10'] = $data_array["playerName"];
              $_SESSION['score10'] = $data_array["total"];
              break;}

          

  $data["none"] = "null";
break;

case "getleaderboard":
  $json_data = file_get_contents('php://input');
  $data_array = json_decode($json_data, true);
  if (isset($_SESSION['playerName1'])) {
  $data["playerName1"] = $_SESSION['playerName1'];
  $data["score1"] = $_SESSION['score1'];}

  if (isset($_SESSION['playerName2'])) {
  $data["playerName2"] = $_SESSION['playerName2'];
  $data["score2"] = $_SESSION['score2'];}

  if (isset($_SESSION['playerName3'])) {
  $data["playerName3"] = $_SESSION['playerName3'];
  $data["score3"] = $_SESSION['score3'];}

  if (isset($_SESSION['playerName4'])) {
  $data["playerName4"] = $_SESSION['playerName4'];
  $data["score4"] = $_SESSION['score4'];}

  if (isset($_SESSION['playerName5'])) {
  $data["playerName5"] = $_SESSION['playerName5'];
  $data["score5"] = $_SESSION['score5'];}

  if (isset($_SESSION['playerName6'])) {
  $data["playerName6"] = $_SESSION['playerName6'];
  $data["score6"] = $_SESSION['score6'];}

  if (isset($_SESSION['playerName7'])) {
  $data["playerName7"] = $_SESSION['playerName7'];
  $data["score7"] = $_SESSION['score7'];}

  if (isset($_SESSION['playerName8'])) {
  $data["playerName8"] = $_SESSION['playerName8'];
  $data["score8"] = $_SESSION['score8'];}

  if (isset($_SESSION['playerName9'])) {
  $data["playerName9"] = $_SESSION['playerName9'];
  $data["score9"] = $_SESSION['score9'];}

 if (isset($_SESSION['playerName10'])) {
  $data["playerName10"] = $_SESSION['playerName10'];
  $data["score10"] = $_SESSION['score10'];}
  $data["none"] = "null";
break;
  
  



case "version":
default:
    $data = ["version" => "1.0"];
}

header("Content-Type: application/json");
echo json_encode($data);