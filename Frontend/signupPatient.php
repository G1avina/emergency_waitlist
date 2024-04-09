<?php
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
<script src="signupPatient.js" defer></script>
<link rel="stylesheet" type="text/css" href="signup.css">

<title>Signup patient page</title>




</head>


<body>
<br>
<a href="adminPage.php">back</a>
<br>
<br>
<div id = "error" class = "error"></div>
<br>

<div id = "PatientSignupInterface" class = "SignupInterface">

    <form id = "PatientSignupForm"  class = "SignupForm" action="/API/apiPatientSignup.php" method="post">
        <label for="name">nom: </label><br>
        <input type="text" id ="nom">
        <br>
        <label for="prenom">prenom: </label><br>
        <input type="text" id ="prenom">
        <br>
        <label for="age">Age: </label><br>
        <input type="text" id ="age">
        <br>
        <label for="desc">blessure_description: </label><br>
        <input type="text" id ="desc">
        <br>
        <label for="niv">blessure_niveau: </label><br>
        <input type="text" id ="niv">
        <br>
        <br>
        <input type="submit" value="Submit">
    </form>
</div>


</body>



</html>