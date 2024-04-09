<?php
session_start();

?>
<!DOCTYPE html>

<html>

<head>
<script src="login.js" defer></script>
<script src="../Asset/jquery-3.7.1.js"></script>
<link rel="stylesheet" type="text/css" href="login.css">

<title>index</title>




</head>


<body>



<div id = "LoginInterface" class = "LoginInterface">
    <div class = "login">LOGIN</div>
    <br>

    <form id = "LoginForm"  class = "LoginForm" action="/API/apiLogin.php" method="post">
        <label for="username">Username: </label><br>
        <input type="text" id ="username" class = "in">
        <br>
        <label for="password">Password: </label><br>
        <input type="text" id ="password" class = "in">
        <br>
        <br>
        <input type="submit" value="Submit" class = "butt">
        <br>
        <div id = "error" class = "error"></div>
    </form>
</div>








</body>



</html>