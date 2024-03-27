<?php
session_start();



session_unset();

session_destroy();

// Redirect to target.php in the frontend folder
header("Location:login.php");
exit; // Ensure subsequent code is not executed after redirection

?>