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

			if(isset($_POST['shto_perdorues'])) 
			{	
				$Emri = $_POST['Emri'];
				$Fjalekalimi = MD5($_POST['Fjalekalimi']);
				$Email = $_POST['Email'];
			
				if(empty($Emri) || empty($Fjalekalimi) || empty($Email))
				{			
					if(empty($Emri)) {echo "<font color='red'>Fusha Emri është e zbrazët.</font><br/>";}
					if(empty($Fjalekalimi)) {echo "<font color='red'>Fusha Mbiemri është e zbrazët.</font><br/>";}
					if(empty($Email)) {echo "<font color='red'>Fusha Email është e zbrazët.</font><br/>";}
					echo "<br/><a href='javascript:self.history.back();'>Kthehu mbrapa</a>";
				} 
				else
				{ 
					$rezultati = mysqli_query($lidhe, "CALL umshs_shto_perdoruesin ('$Emri','$Fjalekalimi','$Email')");
					echo "<script>setTimeout(function(){window.location.href = 'perdoruesit.php';}, 5000);</script>";
				 	echo"<p><b>   E dhëna është duke u regjistruar në sistem. Ju lutemi pritni 5 sekonda. <b></p>";
				}
			}
		?>
	</body>
</html>