<?php
//CHECK IF LOGGED IN
session_start();
require_once('../Database/database.php');
require_once('../Backend/sortQueue.php');

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
header("Location:logout.php");
exit;
}

?>


<!DOCTYPE html>

<html>

<head>
<script src="../Asset/jquery-3.7.1.js"></script>
<link rel="stylesheet" type="text/css" href="patientPage.css">

<title>Patient Page</title>




</head>


<body>
<div class = "container">
<h1>Your are #: <?php echo $row["queue"]?> in queue</p></h1>
<br>
<div class="patient-info">
<p>username: <?php echo $_SESSION["username"] ?></p>
<br>
<p>prenom:  <?php echo $row["prenom"] ?></p>
<br>
<p>nom:  <?php echo $row["nom"] ?></p>
<br>
<p>age:  <?php echo $row["age"] ?></p>
<br>
<p>blessure description:  <?php echo $row["blessure_description"] ?></p>
<br>
<p>blessure niveau:  <?php echo $row["blessure_niveau"] ?></p>
<br>
<p>temps enregistrer:  <?php echo $row["temps_enregistrer"] ?></p>
<br>
<p>idadmin:  <?php echo $row["idadmin"] ?></p>
<br>
<br>


<a href="logout.php">logout</a>

</div>


</body>



</html>