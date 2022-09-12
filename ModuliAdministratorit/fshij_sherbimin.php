<?php
    include("konfiguro.php");

    $ID_Sherbimi = $_GET['ID_Sherbimi'];

    $rezultati = mysqli_query($lidhe,"CALL umshs_fshij_sherbimin ('$ID_Sherbimi')");

    header("Location:menaxho_sherbimin.php");
?>

