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
<link rel="stylesheet" type="text/css" href="adminPage.css">

<title>Admin Page</title>




</head>


<body>
<br>
<a href="adminView.php">View the patient queue</a>
<br>
<a href="signupAdmin.php">Sign up an new admin</a>
<br>
<a href="signupPatient.php">Register a patient</a>
<br>
<a href="logout.php">logout</a>


</body>



</html>