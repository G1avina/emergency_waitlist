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

<title>Admin view pag</title>




</head>


<body>
Hello this is the admin view page
<br>
username: <?php echo $_SESSION["username"] ?>
<br>
<a href="adminPage.php">back</a>


</body>



</html>