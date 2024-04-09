<?php
//CHECK IF LOGGED IN
session_start();

if(isset($_SESSION['connected']) && $_SESSION['connected'] == 'admin') {

}else {
header("Location:logout.php");
exit;
}

?>


<!DOCTYPE html>

<html>

<head>
<script src="../Asset/jquery-3.7.1.js"></script>
<script src="signupAdmin.js" defer></script>
<link rel="stylesheet" type="text/css" href="signup.css">

<title>Signup admin page</title>




</head>


<body>
<br>
<a href="adminPage.php">back</a>


<br><br>
<div id = "error" class = "error"></div>
<br>

<div id = "AdminSignupInterface" class = "SignupInterface">

    <form id = "AdminSignupForm"  class = "SignupForm" action="/API/apiAdminSignup.php" method="post">
        <label for="id">id: </label><br>
        <input type="text" id ="id">
        <br>
        <label for="name">nom: </label><br>
        <input type="text" id ="nom">
        <br>
        <label for="prenom">prenom: </label><br>
        <input type="text" id ="prenom">
        <br>
        <label for="email">email: </label><br>
        <input type="text" id ="email">
        <br>
        <label for="age">Age: </label><br>
        <input type="text" id ="age">
        <br>
        <label for="password">Password: </label><br>
        <input type="text" id ="password">
        <br>
        <br>
        <input type="submit" value="Submit">
    </form>
</div>


</body>



</html>