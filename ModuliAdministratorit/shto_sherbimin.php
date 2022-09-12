<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>UMSHS | Moduli i Administratorit</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<?php
			include_once("konfiguro.php");

			if(isset($_POST['shto_sherbimin'])) 
			{	
				$Emri_Sherbimit	 = $_POST['Emri_Sherbimit'];
				$Foto_Sherbimit =addslashes (file_get_contents($_FILES['Foto_Sherbimit']['tmp_name']));

				$maxsize = 10000000; //set to approx 10 MB

				$Emri_FotoSherbimit = $_FILES['Foto_Sherbimit']['name'];
				$Pershkrimi_Sherbimit = $_POST['Pershkrimi_Sherbimit'];
				$Veglat_Sherbimit = $_POST['Veglat_Sherbimit'];
				$ID_Kategoria = $_POST['ID_Kategoria'];
			
				if(empty($Emri_Sherbimit) || empty($Veglat_Sherbimit) || empty($Pershkrimi_Sherbimit))
				{			
					if(empty($Emri_Sherbimit)) {echo "<font color='red'>Fusha Emri i shërbimit të sigurisë është e zbrazët.</font><br/>";}
					if(empty($Veglat_Sherbimit)) {echo "<font color='red'>Fusha Veglat e shërbimit të sigurisë është e zbrazët.</font><br/>";}
					if(empty($Pershkrimi_Sherbimit)) {echo "<font color='red'>Fusha Përshkrimi i shërbimit të sigurisë është e zbrazët.</font><br/>";}
					echo "<br/><a href='javascript:self.history.back();'>Kthehu mbrapa</a>";
				} 
				else 
				{ 
					$rezultati = mysqli_query($lidhe, "CALL umshs_shto_sherbimin ('$Emri_Sherbimit','$Foto_Sherbimit',
					'$Emri_FotoSherbimit','$Pershkrimi_Sherbimit','$Veglat_Sherbimit','$ID_Kategoria')");
					echo "<script>setTimeout(function(){window.location.href = 'menaxho_sherbimin.php';}, 5000);</script>";
				 	echo"<p><b>E dhëna është duke u regjistruar në sistem. Ju lutem pritni 5 sekonda. <b></p>";
				}
			}
		?>		
	</body>
</html>