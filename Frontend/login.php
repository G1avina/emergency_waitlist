<?php
session_start();

?>
<!DOCTYPE html>

<html>

<head>
<script src="login.js" defer></script>
<script src="../Asset/jquery-3.7.1.js"></script>

<title>index</title>




</head>


<body>
Hello this is the login page
<br><br>
<button id="test" class = test>Test api and database</button>
<br><br>
<div  id = "testResponse">Answer: </div>

<br><br><br>

<div id = "LoginInterface" class = "LoginInterface">

    <form id = "LoginForm"  class = "LoginForm" action="/API/apiLogin.php" method="post">
        <label for="username">Username: </label><br>
        <input type="text" id ="username">
        <br>
        <label for="password">Password: </label><br>
        <input type="text" id ="password">
        <br>
        <input type="submit" value="Submit">
    </form>
</div>





</body>



</html>