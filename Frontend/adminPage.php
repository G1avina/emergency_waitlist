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

<title>Admin Page</title>




</head>


<body>
Hello this is the admin homepage
<br>
username: <?php echo $_SESSION["username"] ?>
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