<?php
session_start();
require_once('../Database/database.php');

if(isset($_SESSION['connected'])&& $_SESSION['connected'] == 'patient') {


    $query = "SELECT * FROM patient WHERE nom = $1";
    $result = pg_query_params($conn, $query, array($_SESSION["username"]));

    if ($result) {


        if (pg_num_rows($result) == 0) {
            
        }else{

            $row = pg_fetch_assoc($result);
            
        } 


    }else{
        
    }








}else {
header("Location:login.php");
exit;
}

?>


<!DOCTYPE html>

<html>

<head>
<script src="../Asset/jquery-3.7.1.js"></script>

<title>Patient Page</title>




</head>


<body>
Hello this is the patient homepage
<br>
username: <?php echo $_SESSION["username"] ?>
<br>
prenom:  <?php echo $row["prenom"] ?>
<br>
nom:  <?php echo $row["nom"] ?>
<br>
age:  <?php echo $row["age"] ?>
<br>
blessure description:  <?php echo $row["blessure_description"] ?>
<br>
blessure niveau:  <?php echo $row["blessure_niveau"] ?>
<br>
temps enregistrer:  <?php echo $row["temps_enregistrer"] ?>
<br>
idadmin:  <?php echo $row["idadmin"] ?>
<br>
<br>

<a href="logout.php">logout</a>


</body>



</html>