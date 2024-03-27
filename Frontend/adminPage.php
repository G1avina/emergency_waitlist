<?php
session_start();

if(isset($_SESSION['connected'])) {

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


</body>



</html>