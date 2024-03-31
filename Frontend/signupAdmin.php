<?php
session_start();

if(isset($_SESSION['connected']) && $_SESSION['connected'] == 'admin') {

}else {
header("Location:login.php");
exit;
}

?>


<!DOCTYPE html>

<html>

<head>
<script src="../Asset/jquery-3.7.1.js"></script>
<script src="signupAdmin.js" defer></script>

<title>Signup admin page</title>




</head>


<body>
Hello this is the Signup admin page
<br>
username: <?php echo $_SESSION["username"] ?>
<br>
<a href="adminPage.php">back</a>


<br><br>
<div id = "error" class = "error"></div>
<br>

<div id = "AdminSignupInterface" class = "AdminSignupInterface">

    <form id = "AdminSignupForm"  class = "AdminSignupForm" action="/API/apiAdminSignup.php" method="post">
        <label for="username">Username: </label><br>
        <input type="text" id ="username">
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