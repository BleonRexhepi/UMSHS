<?php

    include("konfiguro.php");

    $ID_Kategoria = $_GET['ID_Kategoria'];

    $rezultati = mysqli_query($lidhe,"CALL umshs_fshij_kategorin ('$ID_Kategoria')");

    header("Location:menaxho_kategorin.php");
?>

