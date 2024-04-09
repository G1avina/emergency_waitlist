<?php
//LOGGING OUT THE USER
session_start();



session_unset();

session_destroy();


header("Location:login.php");
exit;

?>