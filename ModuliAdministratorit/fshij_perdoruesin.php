<?php
    include("konfiguro.php");

    $ID_Perdoruesi = $_GET['ID_Perdoruesi'];

    $rezultati = mysqli_query($lidhe,"CALL umshs_fshij_perdoruesin ('$ID_Perdoruesi')");

    header("Location:fshij_perdorues.php");
?>

