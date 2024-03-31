<?php

$host = 'localhost';
$dbname = 'emergency_waitlist';
$username = 'cedricglavina';
//$password = 'your_password'; no password on my user so I wont need this

$conn = pg_connect("host=$host port=5432 dbname=$dbname user=$username");

if (!$conn) {
    //echo "Connection failed";
} else {
  //  echo "Connected successfully";
}