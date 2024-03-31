<?php

//something fails in login
function testGoBackLogin(){
    header("HTTP/1.1 301 Found");
    header("Location: ../Frontend/login.php");
}

//Logs text in logfile.txt used for troubleshoot purposes
function logf($log){
    file_put_contents('logfile.txt', $log . PHP_EOL,FILE_APPEND);
}

function sendError($message){

    $data = ["error" => $message];
    // Bad
    echo json_encode($data);

}