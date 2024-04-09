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
<script src="adminView.js" defer></script>
<link rel="stylesheet" type="text/css" href="adminView.css">

<title>Admin view pag</title>




</head>


<body>
<br>
<div id = "error"></div>
<br>
<a href="adminPage.php">back</a>

<br>
<br>
<?php

require_once('../Database/database.php');
require_once('../Backend/sortQueue.php');

$query = "SELECT * FROM patient ORDER BY queue";
$result = pg_query($conn, $query);


if (!$result) {
    echo "An error occurred.\n";
    exit;
}

$rows = pg_fetch_all($result);
        
        
 
foreach ($rows as $row) {


    echo "<div class ='info'>";

    $q = $row['queue'];
    echo "<p>Place in queue: $q </p>"; 


    $id = $row['idpatient'];
    echo "<p>id: $id </p>"; 
    
    $nom = $row['nom'];
    echo "<p>nom: $nom </p>";
    

    $prenom = $row['prenom'];
    echo "<p>prenom: $prenom </p>"; 

    $age = $row['age'];
    echo "<p>age: $age </p>"; 

    $desc = $row['blessure_description'];
    echo "<p>description: $desc </p>"; 

    $niv = $row['blessure_niveau'];
    echo "<p>niveau: $niv </p>"; 

    $time = $row['temps_enregistrer'];
    echo "<p>temps enregistrer: $time </p>"; 
    echo "<button id ='patientdelete' type='button' data-patient-id = '$id' >Remove Patient</button>";
    echo "<br>";
    echo "</div>";
    
    echo "<br>"; 
}


?>


</body>



</html>